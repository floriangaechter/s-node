Besten Dank f�r Ihre Bestellung vom {$ORDER_TIME|date_format:"%d.%m.%Y um %H:%I"} Uhr im {$SHOPNAME} Online Shop.

Die Bearbeitungsnummer dieser Bestellung lautet: {$ORDER_NR}

Ihre Bestellung:
======================================================================================

{foreach from=$ITEMS item=ITEM}
{$ITEM.quantity} x  {$ITEM.title} � {$ITEM.single_price} => {$ITEM.total_price}
{/foreach}

--------------------------------------------------------------------------------------
Total:               CHF {$TOTALPRICE}
--------------------------------------------------------------------------------------
{if $DISCOUNT > 0}Rabatt               CHF - {$DISCOUNT}
{/if}
Transportkosten:     CHF {$TRANSPORT}
--------------------------------------------------------------------------------------
Gesamtsumme:         CHF {$ENDPRICE}
--------------------------------------------------------------------------------------

Die Lieferung erfolgt in den n�chsten Tagen an folgende Adresse:
======================================================================================

{$ADDRESS.shipping_firstName} {$ADDRESS.shipping_lastName}
{$ADDRESS.shipping_street} {$ADDRESS.shipping_street_nr}
CH - {$ADDRESS.shipping_cityCode} {$ADDRESS.shipping_city}

Die Rechnung wird an folgenden Empf�nger gesendet:
======================================================================================

{$ADDRESS.firstName} {$ADDRESS.lastName}
{$ADDRESS.street} {$ADDRESS.street_nr}
CH - {$ADDRESS.cityCode} {$ADDRESS.city}

Sie k�nnen weitere Bestellungen mit folgendem Benutzernamen durchf�hren:
======================================================================================
Ihr Benutzername:             {$USERNAME}
{if $ADDRESS.cnr != ''}Ihre Kundenummer:        {$ADDRESS.cnr}{/if}


Hinweise und Informationen zum Bestell- und Liefervorgang werden per Mail an {$ADDRESS.email} gesendet.

Freundliche Gr�sse
