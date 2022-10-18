const express = require("express");
const router = express.Router();
const activity_dao = require("../../sport-track-db/sport-track-db").activity;
const activity_entry_dao =
  require("../../sport-track-db/sport-track-db").activity_entry;
const calculDistanceImpl = require("../../static/js/objetbis");

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
          rows: rows,
        });

        console.log(rows);
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

  let json = JSON.parse(
    JSON.parse(JSON.stringify(req.files.file.data.toString("utf8")))
  );
  console.log(json);
  let a = json.activity;
  let arr = { data: [] };

  let d_temp = a.date;
  let day = d_temp.substring(0, 2);
  let month = d_temp.substring(3, 5);
  let year = d_temp.substring(6);
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

    arr.data.push({ latitude: d.latitude, longitude: d.longitude });
  }

  let fMo = Math.round((fMi + fMa) / 2);

  let hD_temp = json.data[0].time;
  let hours = hD_temp.substring(0, 2);
  let min = hD_temp.substring(3, 5);
  let sec = hD_temp.substring(6);
  let timeHr = parseInt(hours) * 3600 * 1000;
  let timeMin = parseInt(min) * 60 * 1000;
  let timeSec = parseInt(sec) * 1000;
  let hD_timeMs = timeHr + timeMin + timeSec;
  let hD = hours + ":" + min + ":" + sec;

  let hF_temp = json.data[json.data.length - 1].time;
  hours = hF_temp.substring(0, 2);
  min = hF_temp.substring(3, 5);
  sec = hF_temp.substring(6);
  timeHr = parseInt(hours) * 3600 * 1000;
  timeMin = parseInt(min) * 60 * 1000;
  timeSec = parseInt(sec) * 1000;
  let hF_timeMs = timeHr + timeMin + timeSec;
  let hF = hours + ":" + min + ":" + sec;

  let du_time = hF_timeMs - hD_timeMs;
  sec = Math.floor(du_time / 1000) % 60;
  min = Math.floor(sec / 60) % 60;
  hours = Math.floor(min / 60);
  sec = sec % 60;
  min = min % 60;
  hours = hours > 9 ? "" + hours : "0" + hours;
  min = min > 9 ? "" + min : "0" + min;
  sec = sec > 9 ? "" + sec : "0" + sec;
  let du = hours + ":" + min + ":" + sec;

  let dist = calculDistanceImpl.calculDistanceTrajet(arr) * 1000;
  let u = sess.user.email;

  let activity = {
    date: date,
    description: de,
    fMin: fMi,
    fMax: fMa,
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

  res.redirect("/homepage");
});

module.exports = router;
