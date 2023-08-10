
<style>
  @supports (-webkit-appearance: none) or (-moz-appearance: none) {
    input[type='checkbox'],
    input[type='radio'] {
      --active: #275EFE;
      --active-inner: #fff;
      --focus: 2px rgba(39, 94, 254, .3);
      --border: #BBC1E1;
      --border-hover: #275EFE;
      --background: #fff;
      --disabled: #F6F8FF;
      --disabled-inner: #E1E6F9;
      -webkit-appearance: none;
      -moz-appearance: none;
      height: 21px;
      outline: none;
      display: inline-block;
      vertical-align: top;
      position: relative;
      margin: 0;
      cursor: pointer;
      border: 1px solid var(--bc, var(--border));
      background: var(--b, var(--background));
      -webkit-transition: background .3s, border-color .3s, box-shadow .2s;
      transition: background .3s, border-color .3s, box-shadow .2s;
    }
    input[type='checkbox']:after, input[type='radio']:after {
      content: '';
      display: block;
      left: 0;
      top: 0;
      position: absolute;
      -webkit-transition: opacity var(--d-o, 0.2s), -webkit-transform var(--d-t, 0.3s) var(--d-t-e, ease);
      transition: opacity var(--d-o, 0.2s), -webkit-transform var(--d-t, 0.3s) var(--d-t-e, ease);
      transition: transform var(--d-t, 0.3s) var(--d-t-e, ease), opacity var(--d-o, 0.2s);
      transition: transform var(--d-t, 0.3s) var(--d-t-e, ease), opacity var(--d-o, 0.2s), -webkit-transform var(--d-t, 0.3s) var(--d-t-e, ease);
    }
    input[type='checkbox']:checked, input[type='radio']:checked {
      --b: var(--active);
      --bc: var(--active);
      --d-o: .3s;
      --d-t: .6s;
      --d-t-e: cubic-bezier(.2, .85, .32, 1.2);
    }
    input[type='checkbox']:disabled, input[type='radio']:disabled {
      --b: var(--disabled);
      cursor: not-allowed;
      opacity: .9;
    }
    input[type='checkbox']:disabled:checked, input[type='radio']:disabled:checked {
      --b: var(--disabled-inner);
      --bc: var(--border);
    }
    input[type='checkbox']:disabled + label, input[type='radio']:disabled + label {
      cursor: not-allowed;
    }
    input[type='checkbox']:hover:not(:checked):not(:disabled),
    input[type='radio']:hover:not(:checked):not(:disabled) {
      --bc: var(--border-hover);
    }
    input[type='checkbox']:focus, input[type='radio']:focus {
      box-shadow: 0 0 0 var(--focus);
    }
    input[type='checkbox']:not(.switch), input[type='radio']:not(.switch) {
      width: 21px;
    }
    input[type='checkbox']:not(.switch):after, input[type='radio']:not(.switch):after {
      opacity: var(--o, 0);
    }
    input[type='checkbox']:not(.switch):checked,
    input[type='radio']:not(.switch):checked {
      --o: 1;
    }

    input[type='checkbox']:not(.switch) {
      border-radius: 7px;
    }
    input[type='checkbox']:not(.switch):after {
      width: 5px;
      height: 9px;
      border: 2px solid var(--active-inner);
      border-top: 0;
      border-left: 0;
      left: 7px;
      top: 4px;
      -webkit-transform: rotate(var(--r, 20deg));
              transform: rotate(var(--r, 20deg));
    }
    input[type='checkbox']:not(.switch):checked {
      --r: 43deg;
    }
    input[type='checkbox'].switch {
      width: 38px;
      border-radius: 11px;
    }
    input[type='checkbox'].switch:after {
      left: 2px;
      top: 2px;
      border-radius: 50%;
      width: 15px;
      height: 15px;
      background: var(--ab, var(--border));
      -webkit-transform: translateX(var(--x, 0));
              transform: translateX(var(--x, 0));
    }
    input[type='checkbox'].switch:checked {
      --ab: var(--active-inner);
      --x: 17px;
    }
    input[type='checkbox'].switch:disabled:not(:checked):after {
      opacity: .6;
    }
  }
  .te1 {
      height: calc(2.25rem + 2px);
      padding: .375rem .75rem;
      font-size: 1rem;
      line-height: 1.5;
      color: #495057;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #ced4da;
      border-radius: .25rem;
      transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
  }
  .te1:disabled, .te1[readonly] {background-color: #e9ecef; opacity: 1;}
  .te1:focus {border-color: #bac8f3; outline: 0; box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);}

</style>

<!-- Modal บันทึกข้อมูลการวิ้่ง -->
<div class="modal fade" id="modalSys" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white">ระบบบันทึกข้อมูล</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <form action="./upload-data" id="form_std" method="post" enctype="multipart/form-data">
          <div class="row">

            <div class="col-lg-6 col-md-12 my-2">
              <label><h3 class="text-gray-700">รูปภาพระยะทาง</h3></label>
                <div class="file-loading">
                  <input 
                    id="input-b1" 
                    type="file" class="file" 
                    data-browse-on-zone-click="true" data-theme="fas"
                    name="img_distance"
                  >
                </div>
            </div>

            <div class="col-lg-6 col-md-12 my-2">
              <label><h3 class="text-gray-700">รูปภาพเซลฟี่ + ขยะ</h3></label>
                <div class="file-loading">
                  <input 
                  id="input-b2" 
                  type="file" class="file" 
                  data-browse-on-zone-click="true" data-theme="fas"
                  name="img_trash"
                  >
                </div>
            </div>

            <div class="col-lg-12" style="margin-top: 70px;">
              <label><h3 class="text-gray-700">กรอกข้อมูล : </h3></label>
                <div class="form-group row">
                <label class="col-lg-2 col-form-label"><h5 class="text-gray-900">ระยะทาง : </h5></label>
                 
                  <!---------- ระยะทาง ------->
                  <div class="col-lg-4">

                    <input 
                    type="text" class="form-control" 
                    id="system_distance" placeholder="ระบุระยะทาง (กิโลเมตร)" 
                    name="system_distance"
                    >

                    <input 
                    type="hidden" class="form-control" 
                    value="<?=$level ?>"
                    name="system_level"
                    id="system_level"
                    >

                    <input 
                    type="hidden" 
                    value="<?= $u_id ?>" 
                    name="system_id"
                    id="system_id"
                    >
                  
                  </div>
                </div>

                <div class="form-group row mt-5">
                  <label class="col-lg-11 col-form-label"><h5 class="text-gray-900">เลือกประเภทขยะ :</h5></label>
                </div>

                <!--------------------- กระดาษ ------------------------>
                <div class="form-group">
                <input 
                    type="checkbox" class="my-2 chb" 
                    onclick="func();"
                >
                    <input 
                    type="text" class="ml-1 te1" 
                    style="width: 50%;" 
                    id="v1" placeholder="ระบุจำนวนขยะ" 
                    name="trash_t1" readonly
                    >
                <span class="text-primary ml-2">กระดาษ</span>
                </div>

                <!-------------------- ถุงพลาสติก ----------------------->
                <div class="form-group">
                <input 
                    type="checkbox" class="my-2 chb" 
                    onclick="func();"
                >
                    <input 
                    type="text" class="ml-1 te1" 
                    style="width: 50%;" 
                    id="v2" placeholder="ระบุจำนวนขยะ" 
                    name="trash_t2" readonly
                    >
                <span class="text-primary ml-2">ถุงพลาสติก</span>
                </div>

                <!------------------- ขวดพลาสติก ---------------------->
                <div class="form-group">
                  <input 
                    type="checkbox" class="my-2 chb" 
                    onclick="func();"
                  >
                  <input 
                    type="text" class="ml-1 te1" 
                    style="width: 50%;" 
                    id="v3" placeholder="ระบุจำนวนขยะ" 
                    name="trash_t3" readonly
                  >
                  <span class="text-primary ml-2">ขวดพลาสติก</span>
                </div>

                <!--------------------- ขวดแก้ว --------------------->
                <div class="form-group">
                  <input 
                    type="checkbox" class="my-2 chb" 
                    onclick="func();"
                  >
                  <input 
                    type="text" class="ml-1 te1" 
                    style="width: 50%;"
                    id="v4" placeholder="ระบุจำนวนขยะ" 
                    name="trash_t4" readonly
                  >
                  <span class="text-primary ml-2">ขวดแก้ว</span>
                </div>

                <!--------------------- กระป๋องเหล็ก ---------------->
                <div class="form-group mb-5">
                  <input 
                    type="checkbox" class="my-2 chb" 
                    onclick="func();"
                  >
                  <input 
                    type="text" class="ml-1 te1" 
                    style="width: 50%;"
                    id="v5" placeholder="ระบุจำนวนขยะ" 
                    name="trash_t5" readonly
                  >
                  <span class="text-primary ml-2">กระป๋องเหล็ก</span>
                </div>

                <div class="form-group row">
                  <div class="col-lg-12 text-center">
                    <button type="submit" class="btn btn-primary" name="upload" id="upload">บันทึกข้อมูล</button>
                    <button type="reset" class="btn btn-danger mx-3 my-2">ล้างข้อมูล</button>
                  </div>
                </div>

            </div>
          </div>
        </form>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script>

</script>