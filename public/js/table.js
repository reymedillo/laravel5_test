var j=0;
function addtable() {
	var tablearea = document.getElementById('tablearea'),
    table = document.createElement('table'),
    tr = document.createElement('tr');

	tr.appendChild( document.createElement('td') );
	tr.appendChild( document.createElement('td') );

	tr.cells[0].appendChild( document.createElement('input')

	)
	.className = 'form-control default-date-picker';
	tr.cells[1].appendChild( document.createTextNode('Text2') );

	for (var i = 1; i < 4; i++) {
	    table.appendChild(tr.cloneNode( true ));
	}

	tablearea.appendChild(table);
}
function tablerow()
{
	$('<input type="text" id="datepicker" name="date" />').appendTo('td').datepicker();
	var tbl = document.getElementById('table1');
	var lastRow = tbl.rows.length;
	var iteration = lastRow - 1;
	var row = tbl.insertRow(lastRow);

	j++;

	var firstCell = row.insertCell(0);
	var irowno = document.createElement('input');
	irowno.type = 'checkbox';
	irowno.name = 'checkbox';
	irowno.id = 'rowno' + iteration;
	firstCell.appendChild(irowno);

	var secondCell = row.insertCell(1);
	var icode = document.createElement('input');
	icode.className = 'form-control datepicker'
	icode.type = 'text';
	icode.id = 'datepicker';
	icode.type = 'text';
	secondCell.appendChild(icode);

	var thirdCell = row.insertCell(2);
	var iuom = document.createElement('input');
	iuom.className = 'form-control';
	iuom.type = 'text';
	iuom.size = 8;
	iuom.readOnly = true;
	thirdCell.appendChild(iuom);

	var fourthCell = row.insertCell(3);
	var iqty = document.createElement('input');
	iqty.className = 'form-control';
	iqty.type = 'text';
	iqty.size = 8;
	iqty.readOnly = true;
	fourthCell.appendChild(iqty);
}

function ar_invoice_addrow()
{
	var rowno=j;
	// var e = document.getElementById('itemdesc');
	var code = document.ar_invoice_form.item.value;
	// var code = e.options[e.selectedIndex].text;
	// var desc = e.options[e.selectedIndex].text;
	var qty = document.ar_invoice_form.qty.value;
	var uom = document.ar_invoice_form.uom.value;
	// var result = price*qty;
	var result = document.ar_invoice_form.warehouse.value;

	var tbl = document.getElementById('ar_invoice_table');
	var lastRow = tbl.rows.length;
	var iteration = lastRow - 1;
	var row = tbl.insertRow(lastRow);



	var firstCell = row.insertCell(0);
	var irowno = document.createElement('input');
	irowno.type = 'checkbox';
	irowno.name = 'checkbox';
	irowno.id = 'rowno' + iteration;
	firstCell.appendChild(irowno);


	j++;

	var secondCell = row.insertCell(1);
	var icode = document.createElement('input');
	icode.className = 'form-control default-date-picker';
	icode.type = 'text';
	icode.name = 'data[Dfleet]['+j+'][itemcode]';
	icode.id = 'code' + j;
	icode.value= code;
	secondCell.appendChild(icode);

	var thirdCell = row.insertCell(2);
	var iuom = document.createElement('input');
	iuom.className = 'form-control';
	iuom.type = 'text';
	iuom.name = 'data[Dfleet]['+j+'][price]';
	iuom.id = 'price' + j;
	iuom.size = 8;
	iuom.value = uom;
	iuom.readOnly = true;
	thirdCell.appendChild(iuom);

	var fourthCell = row.insertCell(3);
	var iqty = document.createElement('input');
	iqty.className = 'form-control';
	iqty.type = 'text';
	iqty.name = 'data[Dfleet]['+j+'][qty]';
	iqty.id = 'qty' + j;
	iqty.size = 8;
	iqty.value = qty;
	iqty.readOnly = true;
	fourthCell.appendChild(iqty);

}
function itemRow()
{
	var rowno=j;
	var e = document.getElementById('sap_itemdesc');
	var name = e.options[e.selectedIndex].text;
	var code = document.frm_so1.sap_itemdesc.value;
	var qty = document.frm_so1.sap_quantity.value;
	var discount = document.frm_so1.sap_discountpercent.value;
	var warehouse = document.frm_so1.sap_warehousecode.value;
	var tbl = document.getElementById('table2');
	var lastRow = tbl.rows.length;
	var iteration = lastRow - 1;
	var row = tbl.insertRow(lastRow);



	var firstCell = row.insertCell(0);
	var irowno = document.createElement('input');
	irowno.type = 'checkbox';
	irowno.name = 'checkbox';
	irowno.id = 'rowno' + iteration;
	firstCell.appendChild(irowno);

	j++;

	var secondCell = row.insertCell(1);
	var icode = document.createElement('input');
	icode.type = 'text';
	icode.name = 'data[Item]['+j+'][itemcode]';
	icode.id = 'code' + j;
	icode.size = 50;
	icode.value=code;
	icode.readOnly = true;
	secondCell.appendChild(icode);

	var thirdCell = row.insertCell(2);
	var iname = document.createElement('input');
	iname.type = 'text';
	iname.name = 'data[Item]['+j+'][itemname]';
	iname.id = 'name' + j;
	iname.size = 8;
	iname.value = name;
	iname.readOnly = true;
	thirdCell.appendChild(iname);

	var fourthCell = row.insertCell(3);
	var iqty = document.createElement('input');
	iqty.type = 'text';
	iqty.name = 'data[Item]['+j+'][itemqty]';
	iqty.id = 'qty' + j;
	iqty.size = 8;
	iqty.value = qty;
	iqty.readOnly = true;
	fourthCell.appendChild(iqty);

	var fifthCell = row.insertCell(4);
	var idiscount = document.createElement('input');
	idiscount.type = 'text';
	idiscount.name = 'data[Item]['+j+'][itemdiscount]';
	idiscount.id = 'discount' + j;
	idiscount.size = 9;
	idiscount.value = discount;
	idiscount.readOnly = true;
	fifthCell.appendChild(idiscount);

	var sixCell = row.insertCell(5);
	var iwarehouse = document.createElement('input');
	iwarehouse.type = 'text';
	iwarehouse.name = 'data[Item]['+j+'][itemwarehouse]';
	iwarehouse.id = 'warehouse' + j;
	iwarehouse.size = 9;
	iwarehouse.value = warehouse;
	iwarehouse.readOnly = true;
	sixCell.appendChild(iwarehouse);
}

function deleterow()
{
	var table = document.getElementById('table1');
	var rowcount = table.rows.length;

	for(var i=0; i<rowcount;i++)
	{
	    var row = table.rows[i];
	    var chkbox = row.cells[0].childNodes[0];
	    if(null != chkbox && true == chkbox.checked)
	    {
	    table.deleteRow(i);
	    rowcount--;
	    i--;
	    }   
	}
}
function ar_invoice_deleterow()
{
	var table = document.getElementById('ar_invoice_table');
	var rowcount = table.rows.length;

	for(var i=0; i<rowcount;i++)
	{
	    var row = table.rows[i];
	    var chkbox = row.cells[0].childNodes[0];
	    if(null != chkbox && true == chkbox.checked)
	    {
	    table.deleteRow(i);
	    rowcount--;
	    i--;
	    }   
	}
}
function deleteItemRow()
{
	var table = document.getElementById('table2');
	var rowcount = table.rows.length;

	for(var i=0; i<rowcount;i++)
	{
	    var row = table.rows[i];
	    var chkbox = row.cells[0].childNodes[0];
	    if(null != chkbox && true == chkbox.checked)
	    {
	    table.deleteRow(i);
	    rowcount--;
	    i--;
	    }   
	}
}
// function createInput() {
//     $('<input type="text" name="date" />').appendTo("form").datepicker();
// };

