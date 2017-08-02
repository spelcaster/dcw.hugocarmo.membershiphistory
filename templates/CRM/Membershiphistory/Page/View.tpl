<table>
    <tr>
        <th>Membership Start Date</th>
        <th>Membership End Date</th>
        <th>Contribution</th>
    </tr>
{foreach from=$data item=entry}
    <tr>
        <td>
            {$entry.start_date}
        </td>
        <td>
            {$entry.end_date}
        </td>
        <td>
            <a target="_blank" href="/civicrm/contact/view/contribution?reset=1&id={$entry.contribution_id}&cid={$entry.cid}&action=view">
                view
            </a>
        </td>
    </tr>
{/foreach}
</table>
