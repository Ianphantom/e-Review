<section id="maincontent" style="background-color:#8bd5fc">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="tagline centered">
            <div class="row">
              <div class="span12">
                <div class="tagline_text">
                  <h2>Commit Payment</h2>
                  <br/>
                  <p stlye="color:red">
                  <?php echo $error;?>
                  </p>
                </div>
                <p>
                  <strong>Please fill in data about the article that you would like to submit!</strong>
                </p>
            <div align="center">
            <?php echo form_open_multipart(base_url().'index.php/editorctl/commitingPayment');?>
          <table>
          <tr>
				<td>
				<label>Nomor Task
						</td>
				<td>
				<select name="pilih">
               <?php $i=0; foreach ($reviewers as $item){
               $i++ ?>
               <option value="<?php echo $item['id_assignment'];?>"><?php echo $item['id_assignment']?></option>
               <?php } ?>
				</select>
				</label>
						</td>
			</tr>
            <tr>
				<td>
				<label>Kurs
						</td>
				<td>
				<select name="kurs">
  			   		<option value="Rupiah">Rupiah</option>
					<option value="US DOLLAR">US Dollar</option>
					<option value="Euro">Euro</option>
				</select>
				</label>
						</td>
			</tr>
            <tr>
                <td>Jumlah</td>
                <td><input type="text" id="jumlah" name="jumlah" width="100" placeholder="800000"></td>
            </tr>
            <tr>
                <td>Bukti Pembayaran</td>
                <td>
                    <input type="file" id="userfile" name="userfile" width="20">
                </td>
            </tr>
        </table>
	
	<input style ="background-color:black; color:white; font-size:17px" type="submit" value="Submit">
</form>
</div>
                </div>
              </div>
            </div>
          </div>
          <!-- end tagline -->
        </div>
      </div>
      
    </div>
  </section>


