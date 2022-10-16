var express = require("express");
var router = express.Router();
const user_dao = require("../../sport-track-db/sport-track-db").user;

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

router.post("/", function (req, res, next) {
  let n = req.body.lastname;
  let p = req.body.firstname;
  let d = req.body.dob;

  if (req.body.genderM == "on") {
    var s = "M";
  } else {
    var s = "F";
  }

  let t = req.body.height;
  let pd = req.body.weight;
  let e = req.body.email;
  let m = req.body.pwd;

  user_dao.update(
    {
      nom: n,
      prenom: p,
      dob: d,
      gender: s,
      height: t,
      weight: pd,
      email: e,
      pwd: m,
    },
    (err) => {
      if (err) {
        throw err;
      }

      res.render("homepage", {
        lastname: n,
        firstname: p,
        dob: d,
        gender: s,
        height: t,
        weight: pd,
        email: e,
        pwd: m,
      });
    }
  );
});

module.exports = router;
