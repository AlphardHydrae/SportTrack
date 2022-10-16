const express = require("express");
const router = express.Router();
const activity_dao = require("../../sport-track-db/sport-track-db").activity;
const activity_entry_dao =
  require("../../sport-track-db/sport-track-db").activity_entry;
const calculDistanceImpl = require("../../static/js/fonction");

router.get("/", function (req, res, next) {
  // activity_dao.findByKey(req.email, function (err, rows) {
  //   if (err) {
  //     throw err;
  //   }

  //   if (rows != null) {
  //     let table = "</td><td>";

  //     rows.forEach(
  //       (activity) =>
  //         "<tr><td>" +
  //         activity.date +
  //         table.activity.description +
  //         table +
  //         activity.fMin +
  //         table.activity.fMax +
  //         table +
  //         activity.fMoy +
  //         table +
  //         activity.hDebut +
  //         table +
  //         activity.hFin +
  //         table +
  //         activity.duree +
  //         "</td></tr>"
  //     );

  //     res.render("homepage", {
  //       lastname: req.lastname,
  //       firstname: req.firstname,
  //       dob: req.dob,
  //       gender: req.gender,
  //       height: req.height,
  //       weight: req.weight,
  //       email: req.email,
  //       pwd: req.pwd,
  //     });
  //   } else {
  //     res.render("homepage", {
  //       lastname: req.lastname,
  //       firstname: req.firstname,
  //       dob: req.dob,
  //       gender: req.gender,
  //       height: req.height,
  //       weight: req.weight,
  //       email: req.email,
  //       pwd: req.pwd,
  //     });
  //   }
  // });

  res.render("homepage", {
    lastname: req.lastname,
    firstname: req.firstname,
    dob: req.dob,
    gender: req.gender,
    height: req.height,
    weight: req.weight,
    email: req.email,
    pwd: req.pwd,
  });
});

router.post("/", function (req, res, next) {
  let json = JSON.parse(req.file);
  let arr = {};

  for (let i = 0; i < json.activity.length - 1; i++) {
    let d_temp = json.activity.date;
    let day = substr(d_temp, 0, 2);
    let month = substr(d_temp, 3, 2);
    let year = substr(d_temp, 6, 4);
    let date = year + "-" + month + "-" + day;

    let de = json.activity.description;
    let fMi = 300;
    let fMa = 0;

    for (let i = 0; i < json.data.length - 1; i++) {
      if (json.data.cardio_frequency > fMa) {
        fMa = json.data.cardio_frequency;
      }

      if (json.data.cardio_frequency < fMi) {
        fMi = json.data.cardio_frequency;
      }

      arr.push({ latitude: d.latitude, longitude: d.longitude });
    }

    let fMo = round((fMi + fMa) / 2);

    let hD_temp = json.data[0].time;
    let hours = substr(hD_temp, 0, 2);
    let min = substr(hD_temp, 3, 2);
    let sec = substr(hD_temp, 6, 2);
    let hD = strval(hours + ":" + min + ":" + sec);

    let hF_temp = json.data[count($json["data"]) - 1].time;
    hours = substr(hF_temp, 0, 2);
    min = substr(hF_temp, 3, 2);
    sec = substr(hF_temp, 6, 2);
    let hF = strval(hours + ":" + min + ":" + sec);

    let du = strtotime(hF) - strtotime(hD);

    let dist = calculDistanceImpl(calculDistanceTrajet(arr)) * 100;
    let u = req.email;

    let activity = {
      date: date,
      description: de,
      fMin: fMin,
      fMax: fMax,
      fMox: fMo,
      hDebut: hD,
      hFin: hF,
      duree: du,
      dist: dist,
      email: u,
    };

    activity_dao.insert(activity, function (err) {
      if (err) {
        throw err;
      }
    });

    for (let i = 0; i < json.data.length - 1; i++) {
      let t = json.data.time;
      let f = json.data.cardio_frequency;
      let la = json.data.latitude;
      let lo = json.data.longitude;
      let alt = json.data.altitude;
      let act = activity.date;

      let data = {
        time: t,
        freq: f,
        lat: la,
        long: lo,
        alt: alt,
        act: act,
      };

      activity_entry_dao.insert(data, function (err) {
        if (err) {
          throw err;
        }
      });
    }
  }

  res.render("homepage", {
    lastname: req.lastname,
    firstname: req.firstname,
    dob: req.dob,
    gender: req.gender,
    height: req.height,
    weight: req.weight,
    email: req.email,
    pwd: req.pwd,
  });
});

function loadpage() {
  router.get("/", function (req, res, next) {
    res.render("changecredentials", {
      lastname: req.lastname,
      firstname: req.firstname,
      dob: req.dob,
      gender: req.gender,
      height: req.height,
      weight: req.weight,
      email: req.email,
      pwd: req.pwd,
    });
  });
}

module.exports = router;
