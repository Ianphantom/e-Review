<section id="intro">
    <div class="jumbotron masthead">
      <div class="container">
      <br>
        <h2 align="center" style="background:#014d19;color:white;padding:5px;font-family: 'Open Sans Condensed', sans-serif;">Review File</h2>

        <table border="1" style="text-align: center;box-shadow: 0px 7px 10px 3px;background: rgb(150, 189, 247);width:100%" align="center">
          <tr style="padding:10px;background-color: #039dfc;color:white;font-size:14px;font-family: 'Open Sans Condensed', sans-serif;">
            <th width="5%">No</th>
            <th width="25%">Judul</th>
            <th width="25%">Kata Kunci</th>
            <th width="25%">File Review</th>
            <th width="10%">Opsi</th>
            <!-- <th width="50px">Task Status</th> -->
          </tr>
          <?php $i=0; foreach ($tasks as $item){
            $i++ ?>
          <tr style="color:black">
            <td><?php echo $i;?></td>
            <td><?php echo $item['judul'];?></td>
            <td><?php echo $item['katakunci'];?></td>
            <td><a style="color:#0544ff" href="<?php echo base_url().'index.php/applicationctl/downloadReview/'.$item['id_assignment'];?>" target="_blank"><?php echo $item['rfilelocation'];?></a></td>
            <td><?php if($item['status']==6){?>
                        <a style="color:white;padding:1px;background-color:blue;box-shadow: 0px 1px 1px 1px" href="<?php echo base_url().'index.php/editorctl/completetask/'.$item['id_task'];?>" target="_blank">Complete</a>
                     <?php } ?></td>
          </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>
</section>