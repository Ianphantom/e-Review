<section id="intro">
    <div class="jumbotron masthead">
      <div class="container">
        <h2  align="center" style="background:#17823b;color:white;padding:5px;font-family: 'Open Sans Condensed', sans-serif;">Review File</h2>

        <table border="1" style="text-align: center;box-shadow: 0px 7px 10px 3px;background:  #ffffff;width:100%" align="center">
          <tr style="padding:1px;background-color: #039dfc;color:white">
            <th width="5%">No</th>
            <th width="25%">Judul</th>
            <th width="25%">Kata Kunci</th>
            <th width="10%">Nomor Tugas</th>
            <!-- <th width="50px">Task Status</th> -->
          </tr>
          <?php $i=0; foreach ($tasks as $item){
            $i++ ?>
          <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $item['judul'];?></td>
            <td><?php echo $item['katakunci'];?></td>
            <td><?php echo $item['id_assignment'];?></td>
          </tr>
          <?php } ?>
        </table>
        <br>
        <hr style="color:black">
		<hr>
    <div align="center">
		<div style="text-align: center;box-shadow: 0px 7px 10px 3px;background:#deebff;padding:10px;width:50%">
		<h3  align="center">
			Task Completation Confirm
		</h3>
		<form action="<?php echo base_url().'index.php/editorctl/completingTask';?>" method="post">
		 <table  align="center">
            <!-- <tr>
                <td>Nomor Tugas:</td>
                <td><input type="text" id="pilih" name="pilih" width="100" placeholder="Nomor Unik*"></td>
            </tr> -->
            <td>
				<label>Nomor Tugas
						</td>
				<td>
				<select name="pilih">
               <?php $i=0; foreach ($tasks as $item){
               $i++ ?>
               <option value="<?php echo $item['id_assignment'];?>"><?php echo $item['id_assignment']?></option>
               <?php } ?>
				</select>
				</label>
						</td>
            <tr>
				<td>
				<label>Tindakan
						</td>
				<td>
				<select name="tindakan">
  			   		<option value="7">Finish</option>
				</select>
				</label>
						</td>
			</tr>
		 </table>
		 <p align="center">
          <input type="submit">
        </p>
		</form>
    </div>
    </div>
      </div>
    </div>
  </div>
</section>