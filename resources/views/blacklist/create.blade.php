@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="panel-body">
                    <h5 align="center" style="color:#ff0000">
                        <strong>รายงานต้องมีหลักฐานประกอบที่ชัดเจนเท่านั้น!!</strong>
                    </h5>
                    <h5 align="center" style="color:#2ECC71"><strong>บทสนทนาต้องครบ เห็นว่าถูกโกงยังไง และต้องมี
                            หลักฐานโอนเงิน</strong></h5>
                    <!--#FA8072   #2ECC71 -->
                    <h5 align="center" style="color:red"><strong>❌ หากข้อมูลไม่ครบ รายงานจะถูกลบทิ้ง ไม่มีข้อยกเว้น
                            ❌</strong></h5>
                    <hr>
                    <h5 align="center" style="color:#FA8072"><strong>ไม่อนุญาตให้ลงรายงานอื่นหากไม่เกี่ยวกับ
                            Refestion
                        </strong></h5>
                    <form class="form-horizontal" name="frm" action="{{ route("blacklist.store") }}"
                        method="post" enctype="multipart/form-data">
                        @method("POST")
                        @csrf
                        <div class="form-group">
                            <label for="input_product" class="col-xs-4 control-label">ของที่ถูกโกง <font color="red">*
                                </font></label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control" name="product" id="product" maxlength="40"
                                    placeholder="สินค้า,'จ้างฟาร์ม skill'" required="">
                            </div>
                        </div>

                        <!-- price -->

                        <div class="form-group">
                            <label for="input_price" class="col-xs-4 control-label">จำนวนเงิน <font color="red">*</font>
                            </label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control" maxlength="13" name="price" id="input_price"
                                    placeholder="ราคาตามใบเสร็จ" required="">
                            </div>
                        </div>


                        <!-- website -->


                        <div class="form-group">
                            <h5 align="center" style="color:#FA8072">
                                <strong>กระรุณาตรวจสอบให้แน่ใจว่ากรอกตรงกับเลขบัญชีผู้โกง</strong>
                            </h5>
                            <label for="input_website" class="col-xs-4 control-label">เลขบัญชี</label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control" name="identity_bank" id="input_website"
                                    placeholder="0123456789">
                            </div>
                        </div>
                        <!-- province -->


                        <div class="form-group">
                            <h5 align="center" style="color:#FA8072"><strong>ไม่ต้องใส่นาย หรือนางสาว หรือนาง </strong></h5>
                            <h5 align="center" style="color:#ff0000"><strong>✅ เพื่อป้องกันผู้บริสุทธิ์เสียหาย หากไม่แน่ใจ
                                    ให้ใส่ว่า "ไม่รู้" ✅ <br> ระบบจะตรวจสอบหาชื่อจากในระบบให้ภายหลัง</strong></h5>
                            <h5 align="center" style="color:#239FF5"><strong>📌 ใส่ชื่อตามชื่อบัญชีทีโอนเงินไปเท่านั้น
                                    ไม่ใช่ชื่อเฟส หรือบัตรปชชที่ถูกแอบอ้าง </strong></h5>
                            <label for="input_first_name" class="col-xs-4 control-label">ชื่อคนขาย (ภาษาไทย) <font
                                    color="red">*</font></label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control" name="firstname"
                                    placeholder="ชื่อบัญชีคนขาย (ไม่ต้องมีนาย นางสาว)" id="input_first_name" maxlength="40"
                                    required="">
                            </div>
                        </div>

                        <!-- LastName -->


                        <div class="form-group">
                            <label for="input_last_name" class="col-xs-4 control-label">นามสกุล(ภาษาไทย) <font color="red">*
                                </font></label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control" name="lastname" id="input_last_name"
                                    placeholder="นามสกุลบัญชีคนขาย" maxlength="40" required="">
                            </div>
                        </div>

                        <!-- other Detail -->

                        <div class="form-group">
                            <label for="input_detail" class="col-xs-2 control-label">รายละเอียดเพิ่มเติม <font color="red">*
                                </font></label>
                            <div class="col-xs-10">

                                <textarea class="form-control" name="detail" rows="15" id="input_detail"
                                    placeholder="บรรยายการซื้อขาย พร้อมเพิ่มรายละเอียดเกี่ยวกับการโกง   พร้อมใส่ชื่อเพจที่ขายของ จะทำให้ชื่อร้านติดกูเกิ้ลดีมากขึ้น"
                                    required=""></textarea>
                            </div>
                        </div>
                        <hr>

                        <b>
                            <div style="text-align: center;">
                                <font color="red">🍀 ต้องลงรูปบทสนทนาตั้งแต่ต้นจนจบ 🍀 <br> ต้องให้เห็น ว่าโกงยังไง ไม่ตอบ
                                    หรือบล๊อค<br> (กดปุ่ม +เพิ่ม ทางขวา เพื่อเพิ่มรูป) </font>
                            </div>
                        </b>
                        <br>

                        <!-- Chat Logs -->

                        <b>
                            <div style="text-align: center;"> บันทึกสนทนา 👉 ต้องแสดงให้เห็นว่าโกงอย่างไร (อย่าอัพโหลด pdf
                                หรือ doc เพราะจะไม่แสดงผล) </div>
                        </b>

                        <br>

                        <b>
                            <div style="text-align: center;">
                                <font color="red"> ก่อนอัพรูปให้ปกปิดข้อมูลส่วนตัว เช่นชื่อ เบอร์โทร ไลน์
                                    เนื่องจากมิฉาชีพจะใช้ข้อมูลเหล่านั้นในการหลอกลวง </font>
                            </div>
                        </b>
                        <h5 align="center" style="color:#ff0000"><strong>❌ หากข้อมูลไม่ครบ จะถูกลบทิ้งทันที ไม่มีข้อยกเว้น
                                ❌</strong></h5>
                        <div class="input_chat_wrapper">
                            <div class="form-group">
                                <!-- <label for="input_chat" class="col-xs-4 control-label">บันทึกสนทนา<font color="red">*(บังคับใส่อย่างน้อยห้ารูป)</font> <br/> <br/>ต้องแสดงให้เห็นว่าโกงอย่างไร </label>
                                                            <div class="col-xs-12"> -->
                                <div class="col-xs-9">
                                    <input type="file" multiple class="form-control input_chat" id="chat1" name="images[]"
                                        required="">
                                    <!-- <input type="file" class="form-control input_chat" id="chat" name="input_chat[]" multiple="multiple" required> -->
                                </div>
                            </div>
                        </div>
                        <!-- Police Docs -->
                        <div class="form-group text-center">
                            <input class="btn btn-primary" type="submit" value="ส่งข้อมูล">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
