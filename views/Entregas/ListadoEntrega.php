<!DOCTYPE html>
<html>
<head>
  <title>entregas</title>
</head>

<style>
 .titulo{
      color:red;
      text-align: center;
    }

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #0087C3;
  text-decoration: none;
}

.sdfsdafdatos {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #555555;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 14px; 
}

#datos {
  padding: 10px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #AAAAAA;
}

#logo {
  float: left;
  margin-top: 8px;
}

#logo img {
  height: 70px;
}

#company {
  float: right;
  text-align: right;
}


#details {
  margin-bottom: 50px;
}

#client {
  padding-left: 6px;
  border-left: 6px solid #0087C3;
  float: left;
}

#client .to {
  color: #777777;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

#invoice {
  float: right;
  text-align: right;
}

#invoice h1 {
  color: #0087C3;
  font-size: 2.4em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 10px 0;
}

#invoice .date {
  font-size: 1.1em;
  color: #777777;
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table th,
table td {
  padding: 20px;
  background: #EEEEEE;
  text-align: center;
  border-bottom: 1px solid #FFFFFF;
}

table th {
  white-space: nowrap;        
  font-weight: normal;
}

table td {
  text-align: right;
}

table td h3{
  color: #57B223;
  font-size: 1.2em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #FFFFFF;
  font-size: 1.6em;
  background: #57B223;
}

table .desc {
  text-align: left;
}

table .unit {
  background: #DDDDDD;
}

table .qty {
}

table .total {
  background: #57B223;
  color: #FFFFFF;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table tbody tr:last-child td {
  border: none;
}

table tfoot td {
  padding: 10px 20px;
  background: #FFFFFF;
  border-bottom: none;
  font-size: 1.2em;
  white-space: nowrap; 
  border-top: 1px solid #AAAAAA; 
}

table tfoot tr:first-child td {
  border-top: none; 
}

table tfoot tr:last-child td {
  color: #9EDA90;
  font-size: 1.4em;
  border-top: 1px solid #57B223; 

}

table tfoot tr td:first-child {
  border: none;
}

#thanks{
  font-size: 2em;
  margin-bottom: 50px;
}

#notices{
  padding-left: 6px;
  border-left: 6px solid #0087C3;  
}

#notices .notice {
  font-size: 1.2em;
}

p {
  color: #777777;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #AAAAAA;
  padding: 8px 0;
  text-align: center;
}




</style>

<body>
  <div style="position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #555555;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 14px;" class="clearfix">
    <div id="logo">
      <img src="assets/dashboard/images/icon/L-LuzDary-small-blanco (1).png" >
  </div>
   <div id="company">
        <h2 class="name">Tienda Luz dary</h2>
        <label>cra 78, US</label> 
        <strong>(602) 519-0450</strong>
        <strong><a href="mailto:company@example.com"></a></strong>
      </div>
  </div>
  <div>
  <div id="details" class="clearfix">
        <div id="client">
          <div class="to">Representante:</div>
          <h2 class="name"><?php echo $_SESSION['usuario']->Nombre?></h2>
          <div class="address"><?php echo $_SESSION['usuario']->Apellido?></div>
          <div class="email"><a href="mailto:john@example.com"><?php echo $_SESSION['usuario']->Correo?></a></div>
        </div>
        <div id="invoice">
          <h1></h1>
          <div class="date">Date of Invoice: 01/06/2014</div>
          <div class="date">Due Date: 30/06/2014</div>
        </div>
      </div>
 

    
    
    <table  border="0" cellspacing="0" cellpadding="0" >
      <thead>
        <tr>
          <th class="no">#</th>
          <th>Fecha</th>
          <th  class="unit">Total de Material</th>
          <th  class="desc">Descripción de Material</th>
          <th class="unit">Repesentante</th>
          <th>Empleado</th>
          
        </tr>
      </thead>
      <tbody>
        <?php foreach ($entregas as $entrega): 
         if($_SESSION['usuario']->Id_Usuario == $entrega->Id_Usuario){?> 
          <tr>
            <td class="no"><?php echo $entrega->Id_Entrega ?></td>
            <td><?php echo $entrega->Fecha ?></td>
            <td class="unit"><?php echo $entrega->Total_Material ?></td>
            <td class="desc"><?php echo $entrega->Descripcion_Material ?></td>
            <td class="unit"><?php echo $entrega->usuario ?></td>
            <td><?php echo $entrega->Empleado ?></td>                       
          
    </tr
    <?php } ?>>                   
    <?php endforeach?>
        
  </tbody>
</table>
 <div id="thanks">Entregas</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
      </div>
    <p class="footer">
      La factura fue creada en una computadora y es válida sin la firma y el sello.
    </p>
  
</body>

</html>

