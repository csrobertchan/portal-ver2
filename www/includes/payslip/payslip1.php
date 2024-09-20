<?php 
/**
 for display full info.
 */
// start again
$con=mysqli_connect('db','root','hindikoalam','portal');  // this one in error
if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="select * from opis WHERE id=$id";
    $run_sql=mysqli_query($con,$sql) or die(mysqli_error($con));
    foreach($run_sql as $row){

//end while
    //var_dump($run_sql);
    ?>  
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:20px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-0lax{text-align:left;vertical-align:top}
#main {
    width: 800; /*Set to whatever*/
    height: 500;/*Set to whatever*/
}


</style>
<body style="height: 100wh;" onload="window.print()" onafterprint="window.close()" id="main">
<div style="overflow-x: auto;">
<table style="width:100%" class="tg">
<thead>
  <tr>
    <th class="tg-0lax">
      <font>REPUBLIC OF THE PHILIPPINES<br />
            1680 F.T. BENITEZ ST., MALATE, MANILA<br />
            EMPLOYEE PAYSLIP<br />
            LBP ACCOUNT
      </font>
    </th>
    <th class="tg-0lax" colspan="2">
      <font>
            OFFICE/     DSWD FIELD OFFICE MIMAROPA<br />
            ADDRESS  1680 F.T. BENITEZ ST., MALATE, MANILA
      </font>
    </th>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-0lax"><font size="1">NAME OF EMPLOYEE<br /></font>
    <b><?php echo $row["last_name"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row["first_name"]; ?>&nbsp;<?php echo $row["ext"]; ?></b></td>

    <td class="tg-0lax"><font size="1">MONTHLY BASIC RATE<br /></font>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Php <?php echo number_format($row["salary"], 2, '.', ','); ?></b></td>
    <td clas
    s="tg-0lax"><font size="1">PAY-PERIOD<br /></font>
    <?php echo $row["show_stat"]; ?>
    </td>
  </tr>
  <tr>
    <td class="tg-0lax">
      <center><font><b>EARNINGS</b></font></center><br />
      <?php if($row["wages"]=='6000')
      { ?>
      <font>CLOTHING ALLOWANCE</font><div style="float: right;" align="right"><?php echo number_format($row["wages"], 2, '.', ','); ?></div><br />
      <?php } else if($row["show_stat"]=='2023 MIDYEAR BONUS') { ?>
      <font>2023 MIDYEAR BONUS</font><div style="float: right;" align="right"><?php echo number_format($row["wages"], 2, '.', ','); ?></div><br />
      <?php } else { ?>
      <font>SALARY</font><div style="float: right;" align="right"><?php echo number_format($row["wages"], 2, '.', ','); ?></div><br />
      <?php } ?>
      <font>PERA/ACA</font><div style="float: right;" align="right"><?php echo number_format($row["pera"], 2, '.', ','); ?></div><br />
      <?php if($row["status"]=='contractual')
      { ?>
	  <font>SALARY ADJUSTMENT</font><div style="float: right;" align="right"><?php echo number_format($row["salary_adjustment"], 2, '.', ','); ?></div><br /><br /><br />
      <?php } else { ?>
	   <font>PREMIUM</font><div style="float: right;" align="right"><?php echo number_format($row["salary_adjustment"], 2, '.', ','); ?></div><br /><br /><br />
	  <?php } ?>
      <hr width="100" align="right"><font>TOTAL</font><div style="float: right;" align="right"><?php echo number_format($row["gross"], 2, '.', ','); ?></div><br />
      <font>LESS : ABSENCES/TARDINESS</font><div style="float: right;" align="right">
	  <?php if($row["absences"]=='0')
      { } else 
      { echo number_format($row["absences"], 2, '.', ','); } ?></div><br /><br />
      <div style="float: left;" align="left"><?php echo $row["remarks"]; ?></div>
    </td>
    <td class="tg-0lax" colspan="2">
      <center><font><b>DEDUCTIONS</b></font></center><br />
      <font>Life and Retirement(GSIS)</font><div style="float: right;" align="right"><?php if($row["gsis"]=='')
      { } else 
      { echo number_format($row["gsis"], 2, '.', ','); } ?></div><br />
      <font>Pag-ibig</font><div style="float: right;" align="right"><?php echo number_format($row["pagibig"], 2, '.', ','); ?></div><br />
      <font>Philhealth</font><div style="float: right;" align="right"><?php echo number_format($row["philhealth"], 2, '.', ','); ?></div><br />
      <font>CONSOL LOAN</font><div style="float: right;" align="right"><?php echo number_format($row["consol"], 2, '.', ','); ?></div><br />      
      <font>MPL</font><div style="float: right;" align="right"><?php echo number_format($row["mpl"], 2, '.', ','); ?></div><br />
      <font>GFAL</font><div style="float: right;" align="right"><?php echo number_format($row["gfal"], 2, '.', ','); ?></div><br />
      <font>GSIS ELOAN</font><div style="float: right;" align="right"><?php echo number_format($row["gsis_eloan"], 2, '.', ','); ?></div><br />
      <font>HMDF LOAN</font><div style="float: right;" align="right"><?php echo number_format($row["hmdf_loan"], 2, '.', ','); ?></div><br />
      <font>POLICY LOAN</font><div style="float: right;" align="right"><?php echo number_format($row["policy"], 2, '.', ','); ?></div><br />
      <font>TAX</font><div style="float: right;" align="right"><?php echo number_format($row["tax"], 2, '.', ','); ?></div><br />
      <font>SWEAP DUES</font><div style="float: right;" align="right"><?php echo number_format($row["sweap"], 2, '.', ','); ?></div><br />
      <font>SWEAP LOAN</font><div style="float: right;" align="right"><?php echo number_format($row["sweap_loan"], 2, '.', ','); ?></div><br />
      <font>HMO</font><div style="float: right;" align="right"><?php echo number_format($row["hmo"], 2, '.', ','); ?></div><br />
      <font>BEREAVEMENT</font><div style="float: right;" align="right"><?php echo number_format($row["bereavement"], 2, '.', ','); ?></div><br />      
      <font>MP2</font><div style="float: right;" align="right"><?php echo number_format($row["mp2"], 2, '.', ','); ?></div><br />
       <font>SSS</font><div style="float: right;" align="right"><?php echo number_format($row["sss"], 2, '.', ','); ?></div><br />
    </td>
  </tr>
  <tr>
    <td class="tg-0lax"><font>TOTAL EARNINGS</font><div style="float: right;" align="right"><?php echo number_format($row["gross"], 2, '.', ','); ?></div><br /></td>
    <td class="tg-0lax" colspan="2"><font>TOTAL DEDUCTIONS</font><div style="float: right;" align="right"><b><?php echo number_format($row["total_deduct"], 2, '.', ','); ?></div></b></td>
  </tr>
  <tr>
    <td class="tg-0lax">PAYMENT SCHEME</td>
    <td class="tg-0lax">AUTHENTICATED BY</td>
    <td class="tg-0lax">NET EARNINGS<br /><div style="float: right;" align="right"><b><?php echo number_format($row["net_amount"], 2, '.', ','); ?></div></b></td>
  </tr>
  <tr>
    <td class="tg-0lax"><?php echo $row["month1"]; ?><div style="float: right;" align="right"><b><?php echo $row["1st_cutoff"]; ?></div></b></td>
    <td class="tg-0lax" colspan="2"><?php echo $row["month2"]; ?><div style="float: right;" align="right"><b><?php echo $row["2nd_cutoff"]; ?></div></b></td><?php ?>
  </tr>
</tbody>
</table>
</div>
</body>
<?php  
}
}
?> 
