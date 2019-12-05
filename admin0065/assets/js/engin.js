<script>
  function presentasi(dapat,tidak_dapat){
    var persentasi = (dapat + tidak_dapat);
    var dapat_all = (dapat)*100;
    var tidak_dapat_all = (tidak_dapat)*100;
    return {"dapat":dapat_all.toFixed(2),"tidak_dapat":tidak_dapat_all.toFixed(2)};
  }
  function naive_bayes(penguasaanB, jenisL, jenisD, kualitasB, jenisA, kualitasA, sumberA, dayalis){
    var dapat,tidak_dapat;
    var dapat_penguasaanB,tidak_dapat_penguasaanB, 
      dapat_jenisL,tidak_dapat_jenisL, 
      dapat_jenisD,tidak_dapat_jenisD,
      dapat_kualitasB,tidak_dapat_kualitasB, 
      dapat_jenisA,tidak_dapat_jenisA, 
      dapat_kualitasA,tidak_dapat_kualitasA,
      dapat_sumberA,tidak_dapat_sumberA, 
      dapat_dayalis,tidak_dapat_dayalis;
    var dapat_x,tidak_dapat_x;
    var dapat_all,tidak_dapat_all;
    var dapat_prediction,tidak_prediction;
    
      if(penguasaanB == "Milik_Sendiri"){
          dapat_penguasaanB = 17/17;
          tidak_dapat_penguasaanB = 26/63;
      }else if(penguasaanB == "Bebas_Sewa"){
        dapat_penguasaanB = 0/17;
        tidak_dapat_penguasaanB = 37/63;
      }

      if(jenisL == "Kramik"){
          dapat_jenisL = 0/17;
          tidak_dapat_jenisL = 26/63;
      }else if(jenisL == "Ubin"){
        dapat_jenisL = 3/17;
        tidak_dapat_jenisL = 22/63;
      }else if(jenisL == "Sementara"){
        dapat_jenisL = 13/17;
        tidak_dapat_jenisL = 15/63;
      }else if(jenisL == "Tanah"){
        dapat_jenisL = 1/17;
        tidak_dapat_jenisL = 0/63;
      }

      if(jenisD == "Bambu"){
          dapat_jenisD = 7/17;
          tidak_dapat_jenisD = 1/63;
      }else if(jenisD == "Tembok"){
        dapat_jenisD = 10/17;
        tidak_dapat_jenisD = 62/63;
      }

      if(kualitasB == "Bagus"){
          dapat_kualitasB = 1/17;
          tidak_dapat_kualitasB = 34/63;
      }else if(kualitasB == "Kualitas rendah"){
        dapat_kualitasB = 16/17;
        tidak_dapat_kualitasB = 29/63;
      }

      if(jenisA == "Seng"){
          dapat_jenisA = 5/17;
          tidak_dapat_jenisA = 0/63;
      }else if(jenisA == "Asbes"){
        dapat_jenisA = 5/17;
        tidak_dapat_jenisA = 35/63;
      }else if(jenisA == "Genteng"){
        dapat_jenisA = 7/17;
        tidak_dapat_jenisA = 28/63;
      }

      if(kualitasA == "Bagus"){
          dapat_kualitasA = 1/17;
          tidak_dapat_kualitasA = 25/63;
      }else if(kualitasA == "Kualitas rendah"){
        dapat_kualitasA = 16/17;
        tidak_dapat_kualitasA = 38/63;
      }

      if(sumberA == "Ledeng_meteran"){
          dapat_sumberA = 3/17;
          tidak_dapat_sumberA = 33/63;
      }else if(sumberA == "Air_isiulang"){
        dapat_sumberA = 9/17;
        tidak_dapat_sumberA = 22/63;
      }else if(sumberA == "Sumur"){
        dapat_sumberA = 5/17;
        tidak_dapat_sumberA = 8/63;
      }

      if(dayalis == "450"){
          dapat_dayalis = 11/17;
          tidak_dapat_dayalis = 19/63;
      }else if(dayalis == "900"){
        dapat_dayalis = 6/17;
        tidak_dapat_dayalis = 40/63;
      }else if(dayalis == "1300"){
        dapat_dayalis = 0/17;
        tidak_dapat_dayalis = 4/63;
      }
    dapat = 17;
    tidak_dapat = 63;
    dapat_all = dapat/80;
    tidak_dapat_all = tidak_dapat/80;

    dapat_x = dapat_penguasaanB * dapat_jenisL * dapat_jenisD * dapat_kualitasB * dapat_jenisA * dapat_kualitasA * dapat_sumberA * dapat_dayalis;

    tidak_dapat_x = tidak_dapat_penguasaanB * tidak_dapat_jenisL * tidak_dapat_jenisD * tidak_dapat_kualitasB * tidak_dapat_jenisA * tidak_dapat_kualitasA * tidak_dapat_sumberA * tidak_dapat_dayalis;

    dapat_prediction = dapat_x * dapat_all;
    tidak_prediction = tidak_dapat_x * tidak_dapat_all;
    document.querySelectorAll("#hasil")[0].value = (dapat_prediction > tidak_prediction)? "Dapat Bantuan":"Tidak Dapat Bantuan";
    document.form_.elements["dapatPr"].value = dapat_prediction.toFixed(5);
    document.form_.elements["tidakPr"].value = tidak_prediction.toFixed(5);
  }
  function getReady(e){
    e.preventDefault();
    var penguasaanB = document.form_.elements["statusB"].value;
    var jenisL = document.form_.elements["jenis_lantai"].value;
    var jenisD = document.form_.elements["jenis_dinding"].value;
    var kualitasB = document.form_.elements["kualitasB"].value;
    var jenisA = document.form_.elements["jenis_atap"].value;
    var kualitasA = document.form_.elements["kualitas_at"].value;
    var sumberA = document.form_.elements["sumber_air"].value;
    var dayalis = document.form_.elements["daya_listrik"].value;
  
     naive_bayes(penguasaanB, jenisL, jenisD, kualitasB, jenisA, kualitasA, sumberA, dayalis);
  }
</script>