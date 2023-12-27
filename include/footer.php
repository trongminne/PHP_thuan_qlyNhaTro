<footer id="footer-site">
    <div class="top-footer wow fadeInUp">
        <div class="container">
            <div class="footer-bottom wow fadeInUp">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="title-footer" id="lienhe">
                                Website nhà trọ sinh viên trường đại học Sao Đỏ </div>
                            <div class="nav-bottom">
                                <p><span>Địa chỉ: </span>Số 24 Nguyễn Thái Học, TT. Sao Đỏ, Chí Linh, Hải Dương
                                </p>
                                <p style="color:#fff!important"><span>Điện thoại: </span>(024) 6297 9999 - (024)
                                    6686
                                    7777</p>
                                <p><span>Email: </span>edu.dhsd@gmail.com</p>
                                <p><span>Hotline: </span>0347726501</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="map-footer">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14888.839535428146!2d106.40526559999999!3d21.10419695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31357909df4b3bff%3A0xd8784721e55d91ca!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBTYW8gxJDhu48!5e0!3m2!1svi!2s!4v1664611204863!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</footer>

<div class="holine-footer">
    <div class="holine-footer1">
        <span class="title-holine">Hotline</span>
        <a href="tel:0347726501"><span class="holine-phone">0347726501</span></a>
    </div>
</div>
<!-- Nạp tiền -->
<script>
  function handleOpenModalBtnClick(btnId) {
    swal("Nhập số tiền cần nạp", {
      content: {
        element: "input",
        attributes: {
          type: "number",
          min: 1
          // Add any additional attributes as needed
        },
      },
      buttons: {
        cancel: "Cancel",
        confirm: "OK",
      },
    }).then(function(value) {
      if (value === null) {
        // Cancel button is clicked
        swal("Đã thoát nạp tiền");
      } else {
        const amount = value;
        const language = "vn"; // Set the default value for the hidden field
        const bankCode = ""; // Add the bank code value if needed

        if (amount) {
          // Create a form dynamically
          const form = document.createElement('form');
          form.method = 'post';
          form.action = 'vnpay_php/vnpay_create_payment.php';

          // Create hidden input fields for amount, language, and bankCode
          const amountField = document.createElement('input');
          amountField.type = 'hidden';
          amountField.name = 'amount';
          amountField.value = amount;
          form.appendChild(amountField);

          const languageField = document.createElement('input');
          languageField.type = 'hidden';
          languageField.name = 'language';
          languageField.value = language;
          form.appendChild(languageField);

          const bankCodeField = document.createElement('input');
          bankCodeField.type = 'hidden';
          bankCodeField.name = 'bankCode';
          bankCodeField.value = bankCode;
          form.appendChild(bankCodeField);

          // Append the form to the body and submit it
          document.body.appendChild(form);
          form.submit();
        }
      }
    });
  }

  document.getElementById('openModalBtn1').addEventListener('click', function() {
    handleOpenModalBtnClick('openModalBtn1');
  });

  document.getElementById('openModalBtn').addEventListener('click', function() {
    handleOpenModalBtnClick('openModalBtn');
  });
</script>

