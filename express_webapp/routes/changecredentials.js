const express = require("express");
const router = express.Router();
const user_dao = require("../../sport-track-db/sport-track-db").user;

var sess;

router.get("/", function (req, res, next) {
  sess = req.session;

  res.render("changecredentials", {
    lastname: sess.user.nom,
    firstname: sess.user.prenom,
    dob: sess.user.dateDeNaissance,
    gender: sess.user.sexe,
    height: sess.user.taille,
    weight: sess.user.poids,
    email: sess.user.email,
    pwd: sess.user.mdp,
  });
});

router.post("/", function (req, res, next) {
  sess = req.session;

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
    [sess.user.email],
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
        console.log(err);
        res.redirect("/changecredentials");
        // throw err;
      }

      sess.user = {
        lastname: n,
        first: p,
        dob: d,
        gender: s,
        height: t,
        weight: pd,
        email: e,
        pwd: m,
      };

      res.redirect("/homepage");
    }
  );
});

module.exports = router;
