<form method="post" name="o" action="{$smarty.server.PHP_SELF}?TPL={$TPL}">
{include file="includes/lang_selector_simple.tpl" form="o"}
<table cellpadding="0" cellspacing="0" width="100%">
 {foreach from=$NODES item=NODE}
  <tr class="{cycle values="row_a,row_b"}">
   <td>
    <table cellspacing="0" cellpadding="0" width="100%">
     <tr>
      {if $NODE.l != 1}<td class="row" style="padding-left: {$NODE.level*20-32}px; width: 1px;">{if $NODE.subs > 0 || $EVENTS[$NODE.id] > 0}{if $NODE.itw}<a href="javascript:document.forms['o'].x{$BASEID}_open.value={$NODE.pid};document.forms['o'].submit();"><img src="{$XT_IMAGES}icons/minus.gif" alt="" /></a>{else}<a href="javascript:document.forms['o'].x{$BASEID}_open.value={$NODE.id};document.forms['o'].submit();"><img src="{$XT_IMAGES}icons/plus.gif" alt="" /></a>{/if}{else}<img src="{$XT_IMAGES}spacer.gif" width="9" />{/if}</td>{/if}
      <td class="row" style="padding: 5px; padding-right: 0px;width: 16px">
       <a href="javascript:document.forms[0].x{$BASEID}_open.value={$NODE.id};document.forms[0].submit();document.forms['o'].x{$BASEID}_open.value={$NODE.id};document.forms['o'].submit();">{if $NODE.itw}{if $NODE.subs > 0}<img src="{$XT_IMAGES}icons/explorer/folder.png" alt="" />{else}<img src="{$XT_IMAGES}icons/explorer/folder.png" alt="" />{/if}{else}{if $NODE.subs > 0}<img src="{$XT_IMAGES}icons/explorer/folder_closed.png" alt="" />{else}<img src="{$XT_IMAGES}icons/explorer/folder_closed.png" alt="" />{/if}{/if}</a><br />
      </td>
      <td class="row"><a href="javascript:document.forms[0].x{$BASEID}_open.value={$NODE.id};document.forms[0].submit();document.forms['o'].x{$BASEID}_open.value={$NODE.id};document.forms['o'].submit();">{if $NODE.itw}<span style="color: black;">{if $NODE.selected}<b>{$NODE.title}</b>{else}{$NODE.title}{/if}</span>{else}{$NODE.title}{/if}&nbsp;</a></td>
      <td class="button" align="right">&nbsp;</td>
     </tr>
    </table>
   </td>
  </tr>
  {if $NODE.itw}
  {foreach from=$EVENTS[$NODE.id] item=EVENT}
  <tr>
   <td>
    <table cellspacing="0" cellpadding="0" width="100%">
     <tr>
      <td class="row" style="padding-left: {$NODE.level*20-12}px; width: 1px;"><img src="{$XT_IMAGES}spacer.gif" alt="" width="9" /></td>
      <td class="row" style="padding: 5px; padding-right: 0px;width: 16px"><img src="{$XT_IMAGES}icons/document.png" width="16" height="16" /></td>
      <td class="row">{$EVENT.title}</td>
      <td class="button" width="120" align="right"><a href="#" onclick="window.parent.opener.document.forms['{$FORM}'].{$FIELD}.value={$EVENT.id};window.parent.opener.document.forms['{$FORM}'].{$FIELD}_title.value='{$EVENT.title|stripquotes}';window.parent.close();"><img src="{$XT_IMAGES}icons/check.png" width="16" height="16" alt="{"Pick this event"|translate}" /></a></td>
     </tr>
    </table>
   </td>
  </tr>
  {/foreach}
  {/if}
 {/foreach}
</table>
{include file="ch.iframe.snode.events/admin/hiddenValues.tpl"}
</form>