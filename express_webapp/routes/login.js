const express = require("express");
const router = express.Router();
const user_dao = require("../../sport-track-db/sport-track-db").user;

router.get("/", function (req, res, next) {
  res.render("login", { incorrect: "" });
});

router.post("/", function (req, res, next) {
  user_dao.findAll((err, rows) => {
    if (err) {
      throw err;
    }

    let result = JSON.parse(JSON.stringify(rows));
    let i = 0;

    while (i < result.length) {
      let user = result[i];

      if (user.email == req.body.email && user.mdp == req.body.pwd) {
        res.render("homepage", {
          lastname: user.nom,
          firstname: user.prenom,
          dob: user.dateDeNaissance,
          gender: user.sexe,
          height: user.taille,
          weight: user.poids,
          email: user.email,
          pwd: user.mdp,
        });
      }

      i++;
    }

    res.render("login", {
      incorrect: "le nom d'utilisateur ou le mot de passe est incorrect",
    });
  });
});

module.exports = router;
