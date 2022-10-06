class CalculDistance{
    //Constructeur
    constructor(){
        this.R = 6378.137;
    }
    //Méthodes
    calculDistance2PointsGPS(lat1, long1, lat2, long2){
        let ret = 0;
        if (lat1 != null && long1 != null && lat2 != null && long2 != null) {
            let varlat1 = (lat1 * Math.PI) / 180;
            let varlong1 = (long1 * Math.PI) / 180;
            let varlat2 = (lat2 * Math.PI) / 180;
            let varlong2 = (long2 * Math.PI) / 180;
            ret =
            this.R *
            Math.acos(
                Math.sin(varlat2) * Math.sin(varlat1) +
                Math.cos(varlat2) * Math.cos(varlat1) * Math.cos(varlong2 - varlong1)
            );
        }

        return ret;
    }

    calculDistanceTrajet(parcours){
        let dist = 0;
        if (parcours != null) {
            let array = JSON.parse(JSON.stringify(parcours));
            console.log(array);
            for (let i = 0; i < array.data.length - 1; i++) {
            let lat1 = array.data[i].latitude;
            let long1 = array.data[i].longitude;
            let lat2 = array.data[i + 1].latitude;
            let long2 = array.data[i + 1].longitude;
            dist += this.calculDistance2PointsGPS(lat1, long1, lat2, long2);
            }
        }
        return dist;
            }
}


const list = {
    activity: {
      date: "01/09/2022",
      description: "IUT -> RU",
    },
    data: [
      {
        time: "13:00:00",
        cardio_frequency: 99,
        latitude: 47.644795,
        longitude: -2.776605,
        altitude: 18,
      },
      {
        time: "13:00:05",
        cardio_frequency: 100,
        latitude: 47.64687,
        longitude: -2.778911,
        altitude: 18,
      },
      {
        time: "13:00:10",
        cardio_frequency: 102,
        latitude: 47.646197,
        longitude: -2.78022,
        altitude: 18,
      },
      {
        time: "13:00:15",
        cardio_frequency: 100,
        latitude: 47.646992,
        longitude: -2.781068,
        altitude: 17,
      },
      {
        time: "13:00:20",
        cardio_frequency: 98,
        latitude: 47.647867,
        longitude: -2.781744,
        altitude: 16,
      },
      {
        time: "13:00:25",
        cardio_frequency: 103,
        latitude: 47.64851,
        longitude: -2.780145,
        altitude: 16,
      },
    ],
  };

let c1 = new CalculDistance();
console.log(c1.calculDistanceTrajet(list));