<div class="wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-xl-7 mx-auto animated zoomIn delay-2s">

          <div class="card m-b-30">
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <tr>
                  <th style="padding-top:25px;padding-bottom:25px;">
                    DASHBOARD
                    <div class="float-right">null</div>
                  </th>
                </tr>
                <?php $get_menu = $this->db->query("SELECT * FROM main_menu WHERE is_parent=0  ORDER BY sort ASC" ) ?>
                <?php foreach ($get_menu->result() as $menu): ?>
                  <?php $get_sub_menu = $this->db->query("SELECT * FROM main_menu WHERE is_parent = $menu->id_menu") ?>
                  <?php if ($get_sub_menu->num_rows() > 0): ?>
                    <tr>
                      <th>
                        <?=strtoupper($menu->menu)?>
                        <ul>
                        <?php foreach ($get_sub_menu->result() as $sub_menu): ?>
                            <li style="padding:10px;border-bottom:1px solid #e3e3e3">
                              <?=$sub_menu->menu?>
                              <div class="float-right">
                                <input type="checkbox" class="checkbox1 switch1" name="maintenance" switch="success" <?=config_system("maintenance","status")=="1" ? "checked":""?>/>
                                <label for="switch1" data-on-label="Yes" data-off-label="No"></label>
                              </div>
                            </li>
                        <?php endforeach; ?>
                      </ul>
                      </th>
                    </tr>
                    <?php else: ?>
                      <tr>
                        <th style="padding-top:25px;">
                          <?=strtoupper($menu->menu)?>
                          <div class="float-right">
                            <input type="checkbox"  class="checkbox1 switch1" name="maintenance" switch="success" <?=config_system("maintenance","status")=="1" ? "checked":""?>/>
                            <label for="switch1" data-on-label="Yes" data-off-label="No"></label>
                          </div>
                        </th>
                      </tr>
                  <?php endif; ?>
                <?php endforeach; ?>
              </table>


            </div>
          </div>
        </div>
      </div>

    </div>
</div>
