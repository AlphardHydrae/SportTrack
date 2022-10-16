const express = require("express");
const router = express.Router();
const user_dao = require("../../sport-track-db/sport-track-db").user;

router.get("/", function (req, res, next) {
  res.render("login", { incorrect: "" });
});

router.post("/", function (req, res, next) {
  user_dao.find([req.body.email], (err, rows) => {
    if (err) {
      throw err;
    }

    if (rows != null) {
      let user = rows;

      if (user.mdp == req.body.pwd) {
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
      } else {
        res.render("login", {
          incorrect: "le nom d'utilisateur ou le mot de passe est incorrect",
        });
      }
    }
  });
});

module.exports = router;
