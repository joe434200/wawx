<?php
require_once ('Const.php');

/**

* 功能:生成缩略图

* 作者:phpox

* 日期:Thu May 17 09:57:05 CST 2007

*/



class CreatMiniature
{
    //公共变量
    var $srcFile="";        //原图
    var $echoType;            //输出图片类型，link--不保存为文件；file--保存为文件
    var $im="";                //临时变量
    var $srcW="";            //原图宽
    var $srcH="";            //原图高

    //设置变量及初始化
    function SetVar($srcFile,$echoType)
    {
        if (!file_exists($srcFile)){
            echo '源图片文件不存在!';
            exit();
        }
        $this->srcFile=$srcFile;
        $this->echoType=$echoType;
        $info = "";
        $data = GetImageSize($this->srcFile,$info);
        switch ($data[2])
        {
         case 1:
           if(!function_exists("imagecreatefromgif")){
            echo "你的GD库不能使用GIF格式的图片，请使用Jpeg或PNG格式！<a href='javascript:go(-1);'>返回</a>";
            exit();
           }
           $this->im = ImageCreateFromGIF($this->srcFile);
           break;
        case 2:
          if(!function_exists("imagecreatefromjpeg")){
           echo "你的GD库不能使用jpeg格式的图片，请使用其它格式的图片！<a href='Javascript:go(-1);'>返回</a>";
           exit();
          }
          $this->im = ImageCreateFromJpeg($this->srcFile);
          break;
        case 3:
          if(!function_exists("imagecreatefrompng")){
           echo "你的GD库不能使用png格式的图片，请使用其它格式的图片！<a href='Javascript:go(-1);'>返回</a>";
           exit();
          }
          $this->im = ImageCreateFromPNG($this->srcFile);
          break;
         case 6:
          if(!function_exists("imagecreatefromwbmp")){
           echo "你的GD库不能使用bmp格式的图片，请使用其它格式的图片！<a href='Javascript:go(-1);'>返回</a>";
           exit();
          }
          $this->im = $this->ImageCreateFromBmp($this->srcFile);
          break;
      }
      $this->srcW=ImageSX($this->im);
      $this->srcH=ImageSY($this->im);
    }


    // BMP 创建函数 php本身无
function ImageCreateFromBmp($filename)
{
	if (! $f1 = fopen($filename,"rb")) return FALSE;
	$FILE = unpack("vfile_type/Vfile_size/Vreserved/Vbitmap_offset", fread($f1,14));
	if ($FILE['file_type'] != 19778) return FALSE;
	$BMP = unpack('Vheader_size/Vwidth/Vheight/vplanes/vbits_per_pixel'.
	'/Vcompression/Vsize_bitmap/Vhoriz_resolution'.
	'/Vvert_resolution/Vcolors_used/Vcolors_important', fread($f1,40));
	$BMP['colors'] = pow(2,$BMP['bits_per_pixel']);
	if ($BMP['size_bitmap'] == 0) $BMP['size_bitmap'] = $FILE['file_size'] - $FILE['bitmap_offset'];
	$BMP['bytes_per_pixel'] = $BMP['bits_per_pixel']/8;
	$BMP['bytes_per_pixel2'] = ceil($BMP['bytes_per_pixel']);
	$BMP['decal'] = ($BMP['width']*$BMP['bytes_per_pixel']/4);
	$BMP['decal'] -= floor($BMP['width']*$BMP['bytes_per_pixel']/4);
	$BMP['decal'] = 4-(4*$BMP['decal']);
	if ($BMP['decal'] == 4) $BMP['decal'] = 0;
	$PALETTE = array();
	if ($BMP['colors'] < 16777216)
	{
	$PALETTE = unpack('V'.$BMP['colors'], fread($f1,$BMP['colors']*4));
	}
	$IMG = fread($f1,$BMP['size_bitmap']);
	$VIDE = chr(0);
	$res = imagecreatetruecolor($BMP['width'],$BMP['height']);
	$P = 0;
	$Y = $BMP['height']-1;
	while ($Y >= 0)
	{
	$X=0;
	while ($X < $BMP['width'])
	{
	if ($BMP['bits_per_pixel'] == 24)
	$COLOR = unpack("V",substr($IMG,$P,3).$VIDE);
	elseif ($BMP['bits_per_pixel'] == 16)
	{
	$COLOR = unpack("n",substr($IMG,$P,2));
	$COLOR[1] = $PALETTE[$COLOR[1]+1];
	}
	elseif ($BMP['bits_per_pixel'] == 8)
	{
	$COLOR = unpack("n",$VIDE.substr($IMG,$P,1));
	$COLOR[1] = $PALETTE[$COLOR[1]+1];
	}
	elseif ($BMP['bits_per_pixel'] == 4)
	{
	$COLOR = unpack("n",$VIDE.substr($IMG,floor($P),1));
	if (($P*2)%2 == 0) $COLOR[1] = ($COLOR[1] >> 4) ; else $COLOR[1] = ($COLOR[1] & 0x0F);
	$COLOR[1] = $PALETTE[$COLOR[1]+1];
	}
	elseif ($BMP['bits_per_pixel'] == 1)
	{
	$COLOR = unpack("n",$VIDE.substr($IMG,floor($P),1));
	if (($P*8)%8 == 0) $COLOR[1] = $COLOR[1] >>7;
	elseif (($P*8)%8 == 1) $COLOR[1] = ($COLOR[1] & 0x40)>>6;
	elseif (($P*8)%8 == 2) $COLOR[1] = ($COLOR[1] & 0x20)>>5;
	elseif (($P*8)%8 == 3) $COLOR[1] = ($COLOR[1] & 0x10)>>4;
	elseif (($P*8)%8 == 4) $COLOR[1] = ($COLOR[1] & 0x8)>>3;
	elseif (($P*8)%8 == 5) $COLOR[1] = ($COLOR[1] & 0x4)>>2;
	elseif (($P*8)%8 == 6) $COLOR[1] = ($COLOR[1] & 0x2)>>1;
	elseif (($P*8)%8 == 7) $COLOR[1] = ($COLOR[1] & 0x1);
	$COLOR[1] = $PALETTE[$COLOR[1]+1];
	}
	else
	return FALSE;
	imagesetpixel($res,$X,$Y,$COLOR[1]);
	$X++;
	$P += $BMP['bytes_per_pixel'];
	}
	$Y--;
	$P+=$BMP['decal'];
	}
	fclose($f1);
	return $res;
}
// BMP 保存函数，php本身无
function imagebmp ($im, $fn = false)
{
	if (!$im) return false;
	if ($fn === false) $fn = 'php://output';
	$f = fopen ($fn, "w");
	if (!$f) return false;
	$biWidth = imagesx ($im);
	$biHeight = imagesy ($im);
	$biBPLine = $biWidth * 3;
	$biStride = ($biBPLine + 3) & ~3;
	$biSizeImage = $biStride * $biHeight;
	$bfOffBits = 54;
	$bfSize = $bfOffBits + $biSizeImage;
	fwrite ($f, 'BM', 2);
	fwrite ($f, pack ('VvvV', $bfSize, 0, 0, $bfOffBits));
	fwrite ($f, pack ('VVVvvVVVVVV', 40, $biWidth, $biHeight, 1, 24, 0, $biSizeImage, 0, 0, 0, 0));
	$numpad = $biStride - $biBPLine;
	for ($y = $biHeight - 1; $y >= 0; --$y)
	{
	for ($x = 0; $x < $biWidth; ++$x)
	{
	$col = imagecolorat ($im, $x, $y);
	fwrite ($f, pack ('V', $col), 3);
	}
	for ($i = 0; $i < $numpad; ++$i)
	fwrite ($f, pack ('C', 0));
	}
	fclose ($f);
	return true;
}





    //生成扭曲型缩图

    function Distortion($toFile,$toW,$toH)

    {
        $cImg=$this->CreatImage($this->im,$toW,$toH,0,0,0,0,$this->srcW,$this->srcH);
        return $this->EchoImage($cImg,$toFile);
        ImageDestroy($cImg);

    }



    //生成按比例缩放的缩图

    function PRorate($toFile,$toW,$toH)
    {
        $toWH=$toW/$toH;
        $srcWH=$this->srcW/$this->srcH;

        if($toWH<=$srcWH)
        {
            $ftoW=$toW;
            $ftoH=$ftoW*($this->srcH/$this->srcW);
        }
        else
        {
              $ftoH=$toH;
              $ftoW=$ftoH*($this->srcW/$this->srcH);
        }
        if($this->srcW>$toW||$this->srcH>$toH)
        {
            $cImg=$this->CreatImage($this->im,$ftoW,$ftoH,0,0,0,0,$this->srcW,$this->srcH);
            return $this->EchoImage($cImg,$toFile);
            ImageDestroy($cImg);
        }
        else
        {
            $cImg=$this->CreatImage($this->im,$this->srcW,$this->srcH,0,0,0,0,$this->srcW,$this->srcH);
            return $this->EchoImage($cImg,$toFile);
            ImageDestroy($cImg);
        }
    }



    //生成最小裁剪后的缩图

    function Cut($toFile,$toW,$toH)
    {
          $toWH=$toW/$toH;
          $srcWH=$this->srcW/$this->srcH;
          if($toWH<=$srcWH)
          {
               $ctoH=$toH;
               $ctoW=$ctoH*($this->srcW/$this->srcH);
          }
          else
          {
              $ctoW=$toW;
              $ctoH=$ctoW*($this->srcH/$this->srcW);
          }
        $allImg=$this->CreatImage($this->im,$ctoW,$ctoH,0,0,0,0,$this->srcW,$this->srcH);
        $cImg=$this->CreatImage($allImg,$toW,$toH,0,0,($ctoW-$toW)/2,($ctoH-$toH)/2,$toW,$toH);
        return $this->EchoImage($cImg,$toFile);
        ImageDestroy($cImg);
        ImageDestroy($allImg);
    }



    //生成背景填充的缩图

    function BackFill($toFile,$toW,$toH,$bk1=255,$bk2=255,$bk3=255)
    {
        $toWH=$toW/$toH;
        $srcWH=$this->srcW/$this->srcH;
        if($toWH<=$srcWH)
        {
            $ftoW=$toW;
            $ftoH=$ftoW*($this->srcH/$this->srcW);
        }
        else
        {
              $ftoH=$toH;
              $ftoW=$ftoH*($this->srcW/$this->srcH);
        }
        if(function_exists("imagecreatetruecolor"))
        {
            @$cImg=ImageCreateTrueColor($toW,$toH);
            if(!$cImg)
            {
                $cImg=ImageCreate($toW,$toH);
            }
        }
       else
        {
            $cImg=ImageCreate($toW,$toH);
        }
        $backcolor = imagecolorallocate($cImg, $bk1, $bk2, $bk3);        //填充的背景颜色
        ImageFilledRectangle($cImg,0,0,$toW,$toH,$backcolor);
        if($this->srcW>$toW||$this->srcH>$toH)
        {
            $proImg=$this->CreatImage($this->im,$ftoW,$ftoH,0,0,0,0,$this->srcW,$this->srcH);
             if($ftoW<$toW)
             {
                 ImageCopy($cImg,$proImg,($toW-$ftoW)/2,0,0,0,$ftoW,$ftoH);
             }
             else if($ftoH<$toH)
             {
                 ImageCopy($cImg,$proImg,0,($toH-$ftoH)/2,0,0,$ftoW,$ftoH);
             }
             else
             {
                 ImageCopy($cImg,$proImg,0,0,0,0,$ftoW,$ftoH);
             }
        }
        else
        {
             ImageCopyMerge($cImg,$this->im,($toW-$ftoW)/2,($toH-$ftoH)/2,0,0,$ftoW,$ftoH,100);
        }
        return $this->EchoImage($cImg,$toFile);
        ImageDestroy($cImg);
    }

    function CreatImage($img,$creatW,$creatH,$dstX,$dstY,$srcX,$srcY,$srcImgW,$srcImgH)
    {
        if(function_exists("imagecreatetruecolor"))
        {
            @$creatImg = ImageCreateTrueColor($creatW,$creatH);
            if($creatImg)
               ImageCopyResampled($creatImg,$img,$dstX,$dstY,$srcX,$srcY,$creatW,$creatH,$srcImgW,$srcImgH);
            else
            {
                $creatImg=ImageCreate($creatW,$creatH);
                ImageCopyResized($creatImg,$img,$dstX,$dstY,$srcX,$srcY,$creatW,$creatH,$srcImgW,$srcImgH);
            }
         }
         else
         {
            $creatImg=ImageCreate($creatW,$creatH);
            ImageCopyResized($creatImg,$img,$dstX,$dstY,$srcX,$srcY,$creatW,$creatH,$srcImgW,$srcImgH);
         }
         return $creatImg;
    }


    //输出图片，link---只输出，不保存文件。file--保存为文件
    function EchoImage($img,$to_File)
    {
        switch($this->echoType)
        {
            case "link":
                if(function_exists('imagejpeg')) return ImageJpeg($img);
                else return ImagePNG($img);
                break;
            case "file":
                if(function_exists('imagejpeg')) return ImageJpeg($img,$to_File);
                else return ImagePNG($img,$to_File);
                break;
        }
    }
}
