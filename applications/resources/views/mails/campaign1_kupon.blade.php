<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body style="background: rgb(208,26,117);">

    <div style="width: 100%; margin: 0 auto;">
      <div style="text-align: center;">
        <img src="{{ url('picture/firstCampaign/logo-gofress.png') }}">
        <h1 style="color: white; font-size: 55px;">Terima Kasih!</h1>
      </div>
      <div style="min-width: 60%; max-width: 80%; padding: 15px 0px; margin: 0 auto; background: white; padding: 20px 50px;">
        <label style="font-weight: bold; font-size: 20px; line-height: 1.5;">Sebagai apresiasi kami, Anda berhak untuk mendapatkan 1 kemasan Gofress gratis dari kami.<br>Tunjukkan kupon dibawah ini di</label>
        <img style="display: block; margin: 10px 0px;" src="{{ url('picture/firstCampaign/logo-alfamart.png') }}">

        <table style="width: 100%; background-image: url('{{ url('picture/firstCampaign/kupon.png') }}'); background-repeat: no-repeat; background-position: center;">
        	<tr><td style="height: 550px;">&nbsp;</td></tr>
          <tr>
            <td style="text-align: center;"><label style="font-weight: bold; font-size: 20px;">{{ $data[0]['kupon'] }}</label></td>
          </tr>
        </table>

        <br>

        <div style="text-align: center; margin: 10px auto 0px;">
          <label style="color: black; font-size: 12px; margin-bottom: 0px;">
            <a href="{{ url('hello/syarat-ketentuan') }}" style="color: black; font-size: 12px; margin-bottom: 0px; text-decoration: none;">
              <img src="{{ url('picture/firstCampaign/icon-Ketentuan-&-Persyaratan.png') }}" style="width: 25px; position: relative; top: 7px;">
              Ketentuan & Persyaratan
            </a>
          </label>
        </div>
      </div>
    </div>
  </body>
</html>
