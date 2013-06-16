/**
 * 切换增加按钮的状态
 */
function toggleAddButton()
{
    var sel = document.getElementById("all_menu_list");
    document.getElementById("btnAdd").disabled = (sel.selectedIndex > -1) ? false : true;
}

/**
 * 切换移出，上移，下移按钮状态
 */
function toggleButtonSatus()
{
    var sel = document.getElementById("menus_navlist");
    document.getElementById("btnRemove").disabled = (sel.selectedIndex > -1) ? false : true;
    document.getElementById("btnMoveUp").disabled = (sel.selectedIndex > -1) ? false : true;
    document.getElementById("btnMoveDown").disabled = (sel.selectedIndex > -1) ? false : true;
}

/**
 * 移动选定的列表项
 */
function moveOptions(direction)
{
    var sel = document.getElementById('menus_navlist');
    if (sel.selectedIndex == -1)
    {
        return;
    }

    len = sel.length
    for (i = 0; i < len; i++)
    {
        if (sel.options[i].selected)
        {
            if (i == 0 && direction == 'up')
            {
                return;
            }

            newOpt = sel.options[i].cloneNode(true);

            sel.removeChild(sel.options[i]);
            tarOpt = (direction == "up") ? sel.options[i-1] : sel.options[i+1]
            sel.insertBefore(newOpt, tarOpt);
            newOpt.selected = true;
            break;
        }
    }
}

/**
* 检查表单输入的数据
*/
function validate()
{

	 clearError();
	 get_navlist();
	 
	 realname = $('realname').value;
	 
	 email = $('email').value;
	 
	
	
	 errors = new Array();
	 isNotBlank(realname,"真实姓名",errors);
	 isNotBlank(email,"EMail",errors);
	 isMail(email,"EMail",errors);
	 
	 
	 oldpwd = $('old_password').value;
	 newpwd = $('new_password').value;
	 confirmnewpwd = $('pwd_confirm').value;
	 if (oldpwd !='' || newpwd != '' || confirmnewpwd !='')
	 {
		 isNotBlank(oldpwd,"原始密码",errors);
		 isNotBlank(newpwd,"新密码",errors);
		 isNotBlank(confirmnewpwd,"确认密码",errors);
		 
		 oldpass = $('xixihaha').value;
		 equals(oldpass,oldpwd,"旧密码","输入旧密码",errors);
		 equals(newpwd,confirmnewpwd,"新密码","确认密码",errors);
	 }
	 
	
	 if (errors.length > 0)
	 {
		  showWarning(errors);
		  return true;
	 }
	$('theForm').submit();
}

function get_navlist()
{
  if (!document.getElementById('nav_list'))
  {
    return;
  }

  document.getElementById('nav_list').value = joinItem(document.getElementById('menus_navlist'));
  //alert(document.getElementById('nav_list[]').value);
  //alert(document.getElementById('nav_list[]').value);
}