const express = require("express");
const router = express.Router();
const activity_dao = require("../../sport-track-db/sport-track-db").activity;
const activity_entry_dao =
  require("../../sport-track-db/sport-track-db").activity_entry;
const calculDistanceImpl = require("../../static/js/fonction");

var sess;

router.get("/", function (req, res, next) {
  sess = req.session;

  activity_dao.findByKey([sess.user.email], function (err, rows) {
    if (err) {
      console.log(err);
      // throw err;
    } else {
      if (rows != null) {
        res.render("homepage", {
          lastname: sess.user.lastname,
          firstname: sess.user.firstname,
          dob: sess.user.dob,
          gender: sess.user.gender,
          height: sess.user.height,
          weight: sess.user.weight,
          email: sess.user.email,
          pwd: sess.user.pwd,
          rows: { rows },
        });

        console.log("The user information was loaded successfully");
      } else {
        res.render("homepage", {
          lastname: sess.user.lastname,
          firstname: sess.user.firstname,
          dob: sess.user.dob,
          gender: sess.user.gender,
          height: sess.user.height,
          weight: sess.user.weight,
          email: sess.user.email,
          pwd: sess.user.pwd,
          rows: null,
        });

        console.log("The user information could not be loaded");
      }
    }
  });
});

router.post("/", function (req, res, next) {
  sess = req.session;

  let json = JSON.parse(JSON.stringify(req.files.file.data.toString("utf8")));
  console.log(json);
  console.log(json.data);
  let arr = {};

  for (let a of json.activity) {
    let d_temp = a.date;
    let day = substr(d_temp, 0, 2);
    let month = substr(d_temp, 3, 2);
    let year = substr(d_temp, 6, 4);
    let date = year + "-" + month + "-" + day;

    let de = a.description;
    let fMi = 300;
    let fMa = 0;

    for (let d of json.data) {
      if (d.cardio_frequency > fMa) {
        fMa = d.cardio_frequency;
      }

      if (d.cardio_frequency < fMi) {
        fMi = d.cardio_frequency;
      }

      arr.push({ latitude: d.latitude, longitude: d.longitude });
    }

    let fMo = round((fMi + fMa) / 2);

    let hD_temp = d[0].time;
    let hours = substr(hD_temp, 0, 2);
    let min = substr(hD_temp, 3, 2);
    let sec = substr(hD_temp, 6, 2);
    let hD = strval(hours + ":" + min + ":" + sec);

    let hF_temp = d[count($json["data"]) - 1].time;
    hours = substr(hF_temp, 0, 2);
    min = substr(hF_temp, 3, 2);
    sec = substr(hF_temp, 6, 2);
    let hF = strval(hours + ":" + min + ":" + sec);

    let du = strtotime(hF) - strtotime(hD);

    let dist = calculDistanceImpl(calculDistanceTrajet(arr)) * 100;
    let u = sess.user.email;

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
        console.log(err);
        // throw err;
      } else {
        console.log("The user activity was inserted successfully");
      }
    });

    for (let d of json.data) {
      let t = d.time;
      let f = d.cardio_frequency;
      let la = d.latitude;
      let lo = d.longitude;
      let alt = d.altitude;
      let act = d.date;

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
          console.log(err);
          // throw err;
        } else {
          console.log("The user data was inserted successfully");
        }
      });
    }
  }

  activity_dao.findByKey([sess.user.email], function (err, rows) {
    if (err) {
      console.log(err);
      // throw err;
    } else {
      if (rows != null) {
        res.render("homepage", {
          lastname: sess.user.lastname,
          firstname: sess.user.firstname,
          dob: sess.user.dob,
          gender: sess.user.gender,
          height: sess.user.height,
          weight: sess.user.weight,
          email: sess.user.email,
          pwd: sess.user.pwd,
          rows: { rows },
        });

        console.log("The user information was loaded successfully");
      }
    }
  });
});

module.exports = router;
