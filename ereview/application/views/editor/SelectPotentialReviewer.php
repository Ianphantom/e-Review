<!DOCTYPE html>
<html>
<head>
   <title>Select Potential Reviewer</title>
   <style>
   h1{
      font-color:green;
   }
   </style>
</head>
 
<body >
<hr><hr><hr><hr>
   <h1 align="center" style="background:#17823b;color:white;padding:5px;font-family: 'Open Sans Condensed', sans-serif;">Select Potential Reviewer</h1>
<!-- <p align="center">
   A new Task has been successfully added
</p> -->
<div  align="center" >
<div style="text-align: center;box-shadow: 0px 7px 10px 3px;background:#c8e1fa;padding:10px;width:40%"> 
<h4 style="font-family: 'Alfa Slab One', 'cursive';background:#003870;padding:10px;color:white;letter-spacing:13p">Task Card</h4>
   <table align="center"  style="text-align: left;width:100%">
      <tr>
         <td>Judul</td>
         <td><?php echo $task['judul'];?> </td>
      </tr>
      <tr>
         <td>kata Kunci</td>
         <td><?php echo $task['katakunci'];?> </td>
      </tr>
      <tr>
         <td>Kode Tugas</td>
         <td><?php echo $task['id_task'];?> </td>
      </tr>
      <tr>
         <td>Daftar Reviewer</td>
         <table border="1" align="center"  style="text-align: center;background:#ffffff;width:100%">
          <tr style="padding:1px;background-color: #039dfc;color:white">
            <th width="20px">No</th>
            <th width="120px">Nama</th>
            <th width="20px">No Reviewer</th>
            <th width="100px">Kompetensi</th>
            <th width="100px">Biaya/Halaman</th>
          </tr>
          <?php $i=0; foreach ($reviewers as $item){
            $i++ ?>
          <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $item['nama'];?></td>
            <td><?php echo $item['id_reviewer'];?></td>
            <td><?php echo $item['kompetensi'];?></td>
            <td><?php echo $item['biaya'];?></td>
          </tr>
          <?php } ?>
        </table>
      </tr>
   </table>
</div>
</div>
   <hr>
   <div>
   <form action="<?php echo base_url().'index.php/managemytask/assignment';?>" method="post">
      <table align="center">
       <!-- <tr>
            <td>Pilih Reviewer dengan No:</td>
            <td><input type="text" id="pilih" name="pilih" width="100" placeholder="No_Reviewer*" required></td>
       </tr> -->
       <tr>
            <td>Kode Tugas</td>
            <td><input type="text" id="kode" name="kode" width="100" placeholder="Kode Tugas*" value="<?php echo $task['id_task']?>" required></td>
       </tr>
       <tr>
            <td>Tanggal Deadline</td>
            <td><input type="text" id="deadline" name="deadline" width="100" placeholder="yyyy-mm-dd" required></td>
       </tr>
       <tr>
            <td>Halaman</td>
            <td><input type="text" id="halaman" name="halaman" width="100" placeholder="Jumlah Halaman*" value="<?php echo $task['halaman']?>" required></td>
       </tr>
       <tr>
				<td>
				<label>Nama reviewer
						</td>
				<td>
				<select name="pilih">
               <?php $i=0; foreach ($reviewers as $item){
               $i++ ?>
               <option value="<?php echo $item['id_reviewer'];?>"><?php echo $item['nama']?></option>
               <?php } ?>
				</select>
				</label>
						</td>
			</tr>
      </table>
      <div align="center" style="postion:inline">
      <input type="submit">
      <p style="color:red">Pastikan Kode Tugas Dan Kode Reviewer Sama Dengan Task Card<p>
      </div>
   </form>
   </div>
</body>
</html>