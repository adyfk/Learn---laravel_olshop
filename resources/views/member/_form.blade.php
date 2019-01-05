<input type="hidden" name='id' id='id'>
<input type="hidden" name='user_id' value={{ Auth::user()->id }}>
<div class="form-group mb-1">
        <small>Nama Penerima</small>
        <input type="text" class="form-control" name='nama' id="nama" placeholder="Nama Penerima">
    </div>
    <div class="form-row">
        <div class="form-group col-4 mb-1">
            <small>Provinsi</small><br>
            <select name='prov' class="selectpicker col-12 pl-0 " id='prov' data-live-search="true" data-size="7">
            </select>
        </div>
        <div class="form-group col-4 mb-1">
            <small>Kabupaten</small><br>
            <select name='kab' class="selectpicker col-12 pl-0 " id='kab' data-live-search="true" data-size="7">
            </select>
        </div>
        <div class="form-group col-4 mb-1">
            <small>Kacamatan</small><br>
            <select name='kec' class="selectpicker col-12 pl-0 " id='kec' data-live-search="true" data-size="7">
            </select>
        </div>
    </div>
    <div class="form-group mb-1">
        <small>Kode Pos</small>
        <input type="number" class="form-control col-4 " id="pos" name='pos' placeholder="Kode Pos">
    </div>
    <div class="form-group mb-1">
        <small>Alamat</small>
        <textarea class="form-control" id="alamat" name='alamat' rows="3"></textarea>
    </div>
    <div class="form-group mb-1">
        <small>No Phone</small>
        <input type="number" class="form-control col-6 " id="contact" name='contact' placeholder="Contact">
    </div>