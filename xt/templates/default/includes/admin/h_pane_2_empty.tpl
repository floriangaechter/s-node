{if $smarty.get.adminmode ==1}
    {include file="includes/header/header_admin.tpl"}
     <table cellspacing="0" cellpadding="0" width="100%" style="height: 100%;">
      <tr>
       <td style="background-color: #FFFFFF; border: 1px solid #002E95;" valign="top" width="40%">
        <iframe name="master" src="{$smarty.server.PHP_SELF}?TPL={$m_template}&amp;tabs=1" frameborder="0" style="height: 100%; width: 100%;"></iframe>
       </td>
       <td width="3">
       .<br />.<br />.
       </td>
       <td width="60%">
        {iframe_paper url="?TPL=%TPL%&amp;tabs=0&amp;module=slave1" name="slave1" template=$s1_template}
       </td>
      </tr>
     </table>
{include file="includes/footer/footer_admin.tpl"}
{else}
    {include file="includes/header/header_admin_empty.tpl"}
        {if $smarty.get.tabs == 1}
        {plugin package=$package module=$module tabs=1}
        {else}
        {plugin package=$package module=$module tabs=0}
        {/if}
    {include file="includes/footer/footer_admin_empty.tpl"}
{/if}