<section id="intro">
    <div class="jumbotron masthead">
      <div class="container">
	  <div style="text-align: center;box-shadow: 0px 7px 10px 3px;background:#d7d9de;padding:10px">
        <h3 align="center" style="background:#17823b;color:white;padding:5px;font-family: 'Open Sans Condensed', sans-serif;">My Task list</h3>

        <table border="1" style="text-align: center;box-shadow: 0px 7px 10px 3px;background:#ffffff;width:100%" align="center">
          <tr style="padding:1px;background-color: #039dfc;color:white;">
            <th width="5%">No</th>
            <th width="20%">Judul</th>
            <th width="20%">Kata Kunci</th>
            <th width="20%">FileName</th>
			<th width="5%">Nomor Unik</th>
			<th width="20%">Author</th>
            <th width="10%">Task Status</th>
          </tr>
          <?php $i=0; foreach ($tasks as $item){
            $i++ ?>
          <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $item['judul'];?></td>
            <td><?php echo $item['katakunci'];?></td>
            <td><a style="color:black" href="<?php echo base_url().'index.php/applicationctl/download/'.$item['id_task'];?>" target="_blank"><?php echo $item['filelocation'];?></a></td>
			<td><?php echo $item['id_assignment'];?></td>
			<td><?php echo $item['authors'];?></td>
            <td><?php if ($item['status']==1){
		                	echo "Waiting For Payment";
		                  }else if($item['status']==2){
			                echo "On Progress";	
		                  }else if($item['status']==3){
			                echo "Rejected";
		                  }else if($item['status']==0){
							echo "Not Selected Yet";
						  }else if($item['status']==4){
							echo "Waiting For Confirmation";
						  }else if($item['status']==5){
							echo "Paid";
						  }else if($item['status']==6){
								echo "Finished";
						  }
		                  ?></td>
          </tr>
          <?php } ?>
        </table>
        <hr style="color:black">
		<div align="center">
		<div style="text-align: center;box-shadow: 0px 7px 10px 3px;background:#deebff;padding:10px;width:30%">
		<h3  align="center">
			Task Status-Update Form
		</h3>
		<form action="<?php echo base_url().'index.php/reviewerctl/taskAction';?>" method="post">
		 <table  align="center">
            <!-- <tr>
                <td>Nomor Unik:</td>
                <td><input type="text" id="pilih" name="pilih" width="100" placeholder="Nomor Unik*"></td>
            </tr> -->
			<tr>
				<td>
				<label>Nomor Unik
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
			</tr>
            <tr>
				<td>
				<label>Tindakan
						</td>
				<td>
				<select name="tindakan">
  			   		<option value="2">Accept</option>
					<option value="3">Reject</option>
					<option value="4">Done</option>
					<option value="5">Paid</option>
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
		<br>
		</div>
      </div>
    </div>
  </div>
</section>