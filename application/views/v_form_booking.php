

    <div class="container">

      <div class="bg-faded p-4 my-4">
        <hr class="divider">
        <h2 class="text-center text-lg text-uppercase my-0">Booking
          <strong>Form</strong>
        </h2>
        <hr class="divider">
        <?php echo form_open(base_url('BookingController/create')); ?>
          <div class="row justify-content-center">
            <div class="form-group col-lg-3">
              <label class="text-heading">Nama Pemesan</label>
              <input type="text" class="form-control" placeholder="Bambang Pamungkas / PSSI" name="name" required>
            </div>
            <div class="form-group col-lg-3">
              <label class="text-heading">Nomor Handphone</label>
              <input type="tel" class="form-control" placeholder="081234567890" name="phone" required>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="form-group col-lg-2">
              <label class="text-heading">Lapangan</label>
              <select class="form-control" name="field" style="width:150px;" id="lapangan" onchange="setJam()" required>
                <option value="A" selected>Lapangan A</option>
                <option value="B">Lapangan B</option>
              </select>
            </div>
            <div class="form-group col-lg-2">
              <label class="text-heading">Tanggal Main</label>
              <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>" style="width:175px;" id="tanggal" onchange="setJam();" required>
            </div>
          </div>
          <div class="row justify-content-center" data-toggle="tooltip" data-placement="top" title="Pastikan lama bermain tidak bertabrakan dengan jam merah!">
            <div class="form-group col-lg-2">
              <label class="text-heading">Jam Main</label>
              <div class="input-group" style="width:115px;">
                <select class="form-control" name="time" id="jam" onchange="setLama(this.value);" required>
                </select>
                <span class="input-group-addon">:00</span>
              </div>
            </div>
            <div class="form-group col-lg-2">
              <label class="text-heading">Lama Main</label>
              <div class="input-group" style="width:115px;">
                <input type="number" min="1" max="14" value="1" class="form-control" name="long" id="lama"; required>
                <span class="input-group-addon">jam</span>
              </div>
            </div>
          </div>
          <br>
          <div class="row justify-content-center">
            <div class="form-group col-lg-12 text-center">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
        <?php echo form_close(); ?>
      </div>

    </div>
    <!-- /.container -->

<script type="text/javascript">
  function setJam(e)
  {
    var lapangan = document.getElementById('lapangan').value;
    var tanggal = document.getElementById('tanggal').value;

    if(tanggal != '')
    {
      $.ajax({
        url: "<?php echo base_url('BookingController/getJamKosong'); ?>",
        type: "POST",
        data: { lapangan: lapangan, tanggal: tanggal },
        dataType: 'json',
        success: function(data){
          $('#jam').html(data);
        },
        error: function(xhr, status, error) {
          alert(xhr.responseText);
        }
      });
    }
  }

  function setLama(jam)
  {
    var waktu = parseInt(jam.substring(0,2));
    var lama = 22 - waktu;
    document.getElementById("lama").setAttribute('max', lama);
  }

  window.onload = function() {
    setJam();
};
</script>