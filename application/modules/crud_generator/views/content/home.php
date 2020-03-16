
<div class="wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-xl-4 animated zoomIn delay-2s">
          <div class="card m-b-30">
            <div class="card-body">
              <div class="form-group">
                <?php if (count($list_table) > 0): ?>
                  <label for="">Pilih Table</label>
                  <select class="form-control" name="table" id="table">
                      <option value="">-- pilih table --</option>
                      <?php foreach ($list_table as $tb): ?>
                        <option value="<?=$tb?>"><?=$tb?></option>
                      <?php endforeach; ?>
                  </select>
                  <?php else: ?>
                    <div class="alert alert-danger">Silahkan buat table dulu</div>
                <?php endif; ?>

              </div>

              <div class="clearfix"></div>
              <hr>
              <h6>Controllers <span class="text-danger">(../modules/backend/)</span></h6>
              <ul>
                <?php foreach ($list_controller as $controllers): ?>
                  <li><?=ucfirst($controllers)?>.php</li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>









        <div class="col-md-12 col-xl-8 animated zoomIn delay-2s">
          <div class="card m-b-30">
            <div class="card-body">
              <div class="alert alert-info">
                <p>CRUD Generator adalah istilah untuk sebuah tools yang membantu developer dalam membuat script untuk proses Create Read Update Dan Delete secara otomatis dengan bantuan tools tersebut, jika anda adalah pengguna framework Codeigniter maka CMS M-CRUDIGNITER adalah salah satu tools CRUD Generator yang wajib anda coba.</p>
                <ul>
                  <li>Terintegrasi dengan template premium</li>
                  <li>HMVC</li>
                  <li>Manajemen Admin</li>
                  <li>Manajemen Level</li>
                  <li>Manajemen Menu</li>
                  <li>Form Validation</li>
                  <li>Library Template</li>
                  <li>Ajax (Created, Update, delete)</li>
                  <li>Datatable Serverside</li>
                </ul>

                <ul class="social-links text-center list-inline mb-0 mt-3">
                    <li class="list-inline-item">
                        <a target="_blank" href="https://web.facebook.com/mpampam" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a target="_blank" href="https://api.whatsapp.com/send?phone=+6285288882994" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Whatsapp"><i class="fa fa-whatsapp"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a target="_blank" href="tel:085288882994" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="085288882994"><i class="fa fa-phone"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a target="_blank" href="https://www.instagram.com/m_pampam/" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Instagram"><i class="fa fa-instagram"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a target="_blank" href="https://www.youtube.com/channel/UC1TlTaxRNdwrCqjBJ5zh6TA" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Youtube"><i class="fa fa-youtube"></i></a>
                    </li>
                </ul>
              </div>

            </div>
          </div>
        </div>




      </div>

    </div>
</div>
