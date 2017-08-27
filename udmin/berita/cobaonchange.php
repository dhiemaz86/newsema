<form method="POST" action="#" id="frm1">
Kota : <select name="idkota" id="idkota">
        <option value="1">Jakarta</option>
        <option value="2">Bogor</option>
        <option value="3">Bandung</option>
        <option value="4">Surabaya</option>
        <option value="5">Kebumen</option>
      </select>
<br/>
Kota Pilihan : <input type="text" name="kota" value="" size="20"/>
</form>


<script type="text/javascript" src="jquery.js"></script>
 <script type="text/javascript">
 
$(document).ready(function() {
 
  $("#idkota").change(function() {
    //alert($(this).find("option:selected").text()+' clicked!');
    var terpilih = $(this).find("option:selected").text();
    $("#frm1 :input[name='kota']").val(terpilih);
 
});
 
 });
 </script>