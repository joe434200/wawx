<div id="advice_error" class="{if $message}success{else}error{/if}" {if $array|@count neq 0} style="display:block"{/if}>
  {if $array|@count neq 0}
  <ul>
  {section name = sec loop = $array.error}
    <li> {$array.error[sec]->message}</li>
  {/section}
  </ul>
  {elseif $message}
  <ul>
    <li>{$message}</li>
  </ul>
  {/if}
</div>

<!--
<div id="advice_error" class="{if $message}success{else}error{/if}" {if $array|@count neq 0} style="display:block"{/if}>
  <ul>
  {foreach from=$errs item=err}
    <li>{$err->message}</li>
  {/foreach}
  </ul>
  <ul>
    <li>{$message}</li>
  </ul>
</div>
-->