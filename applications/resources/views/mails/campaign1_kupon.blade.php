<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body style="background: rgb(208,26,117);">

    <div style="width: 60%; margin: 0 auto;">
      <div style="text-align: center;">
        <img src="{{ url('picture\firstCampaign\logo-gofress.png') }}">
        <h1 style="color: white; font-size: 55px;">Terima Kasih!</h1>
      </div>
      <div style="width: 60%; padding: 15px 0px; margin: 0 auto; background: white; padding: 20px 50px;">
        <label style="font-weight: bold; font-size: 20px; line-height: 1.5;">Sebagai apresiasi kami, Anda berhak untuk mendapatkan 1 kemasan Gofress gratis dari kami.<br>Tunjukkan kupon dibawah ini di</label>
        <img style="display: block; margin: 10px 0px;" src="{{ url('picture\firstCampaign\logo-alfamart.png') }}">

        <div style="position: relative; margin: 10px 0px -10px;">
          <img style="width: 100%;" src="{{ url('picture\firstCampaign\kupon.png') }}">
          <div style="position: relative; bottom: 72px; width: 50%; margin: 0 auto; text-align: center;">
            <label style="font-weight: bold; font-size: 20px;">{{ $data[0]['kupon'] }}</label>
          </div>
        </div>

        <div>
          <label style="font-weight: normal; font-size: 18px;">Tekan gambar diatas dan simpan gambarnya di handphonemu.</label>
        </div>
        
        <div style="text-align: center; margin: 10px auto 0px;">
          <label style="color: black; font-size: 12px; margin-bottom: 0px;">
            <a href="" style="color: black; font-size: 12px; margin-bottom: 0px; text-decoration: none;">
              <img src="{{ url('picture\firstCampaign\icon-Ketentuan-&-Persyaratan.png') }}" style="width: 25px; position: relative; top: 7px;">
              Ketentuan & Persyaratan
            </a>
          </label>
        </div>
      </div>
    </div>

   

  </body>
</html>
