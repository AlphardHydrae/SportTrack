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
    }

    if (rows != null) {
      res.render("homepage", {
        lastname: sess.user.nom,
        firstname: sess.user.prenom,
        dob: sess.user.dateDeNaissance,
        gender: sess.user.sexe,
        height: sess.user.taille,
        weight: sess.user.poids,
        email: sess.user.email,
        pwd: sess.user.mdp,
        rows: { rows },
      });

      console.log("The user information was loaded successfully");
    } else {
      res.render("homepage", {
        lastname: sess.user.nom,
        firstname: sess.user.prenom,
        dob: sess.user.dateDeNaissance,
        gender: sess.user.sexe,
        height: sess.user.taille,
        weight: sess.user.poids,
        email: sess.user.email,
        pwd: sess.user.mdp,
        rows: null,
      });

      console.log("The user information could not be loaded");
    }
  });
});

router.post("/", function (req, res, next) {
  sess = req.session;

  let json = JSON.parse(JSON.stringify(req.file.file));
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
      }

      console.log("The user activity was inserted successfully");
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
          console.log(err);
          // throw err;
        }
      });

      console.log("The user data was inserted successfully");
    }
  }

  activity_dao.findByKey([sess.user.email], function (err, rows) {
    if (err) {
      console.log(err);
      // throw err;
    }

    if (rows != null) {
      res.render("homepage", {
        lastname: sess.user.nom,
        firstname: sess.user.prenom,
        dob: sess.user.dateDeNaissance,
        gender: sess.user.sexe,
        height: sess.user.taille,
        weight: sess.user.poids,
        email: sess.user.email,
        pwd: sess.user.mdp,
        rows: { rows },
      });

      console.log("The user information was loaded successfully");
    }
  });
});

module.exports = router;
