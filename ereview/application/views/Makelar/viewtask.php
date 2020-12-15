<section id="intro">
    <div class="jumbotron masthead">
      <div class="container">
      <div class=box style="box-shadow: 10px 10px 10px 10px; padding:20px">
        <h3 align="center" style="background:#17823b;color:white;padding:5px;font-family: 'Open Sans Condensed', sans-serif;">All task</h3>
        <table border="1" style="text-align: center;background: #ffffff;width:100%" align="center">
          <tr style="padding:1px;background-color: #039dfc;color:white">
            <th width="5%">No</th>
            <th width="20%">Judul</th>
            <th width="20%">Kata Kunci</th>
            <th width="20%">Reviewer</th>
            <th width="20%">Authors</th>
            <th width="5%">Nomor Task</th>
            <th width="10%">Task Status</th>
          </tr>
          <?php $i=0; foreach ($tasks as $item){
            $i++ ?>
          <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $item['judul'];?></td>
            <td><?php echo $item['katakunci'];?></td>
            <td><?php echo $item['nama'];?></td>
            <td><?php echo $item['authors'];?></td>
            <td><?php echo $item['id_assignment'];?></td>
            <td><?php if ($item['status']==0){
		                	echo "Wait For Respond";
		                  }else if($item['status']==1){
			                echo "Wait For Payment";	
		                  }else if($item['status']==2){
			                echo "On Progess";
		                  }else if($item['status']==3){
                        echo "Rejected";
                      }else if($item['status']==4){
                        echo "Wait For your Confirmation";
                      }else if($item['status']==5){
                        echo "Wait For Final Confirmation";
                      }else if($item['status']==6){
                        echo "Finished";
                      }else if($item['status']==7){
                        echo "Not Actived";
                      }
		                  ?></td>
          </tr>
          <?php } ?>
        </table>
        </div>
        <hr>
        <div class=box style="box-shadow: 10px 10px 10px 10px; padding:20px">
        <h3 align="center" style="background:#17823b;color:white;padding:5px;font-family: 'Open Sans Condensed', sans-serif;">Submitted To Review</h3>
        <table border="1" style="text-align: center;background:#ffffff;width:100%" align="center">
          <tr style="padding:1px;background-color: #039dfc;color:white">
            <th width="5%">No</th>
            <th width="20%">Judul</th>
            <th width="20%">Kata Kunci</th>
            <th width="20%">Reviewer</th>
            <th width="20%">Authors</th>
            <th width="5%">Nomor Task</th>
            <th width="10%">File</th>
          </tr>
          <?php $i=0; foreach ($review as $item){
            $i++ ?>
          <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $item['judul'];?></td>
            <td><?php echo $item['katakunci'];?></td>
            <td><?php echo $item['nama'];?></td>
            <td><?php echo $item['authors'];?></td>
            <td><?php echo $item['id_assignment'];?></td>
            <td><a style="color:black" href="<?php echo base_url().'index.php/applicationctl/downloadReview/'.$item['id_assignment'];?>" target="_blank"><?php echo $item['rfilelocation'];?></a></td>
          </tr>
          <?php } ?>
        </table>
        <hr>
        <div align="center">
	    	<div style="text-align: center;box-shadow: 0px 7px 10px 3px;background:#deebff;padding:10px;width:50%">
        <h2>Review File Confirmation</h2>
        <form action="<?php echo base_url().'index.php/makelarctl/confirmAction';?>" method="post">
		 <table align="center">
            <!-- <tr>
                <td>Nomor Task</td>
                <td><input type="text" id="pilih" name="pilih" width="100" placeholder="Nomor Task*"></td>
            </tr> -->
            <tr>
				<td>
				<label>Nomor Task
						</td>
				<td>
				<select name="pilih">
               <?php $i=0; foreach ($review as $item){
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
  			   		<option value="1">Confirm</option>
					<option value="3">Reject</option>
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