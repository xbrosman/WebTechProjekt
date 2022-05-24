var trace1 = {
    y: [],
    type: 'scatter'
};

var trace2 = {
    y: [],
    type: 'scatter'
};
var data = [trace1, trace2];
var div = document.getElementById('myDiv');
var layout = {
    xaxis: {
        rangemode: "nonnegative",
        autorange: true,
        title: 't',
    },
    yaxis: {
        autorange: true,
        title: 'y'
    },
    margin: {
        l: 50,
        r: 50,
        b: 100,
        t: 100,
        pad: 4
    },
};

var config = {
    responsive: true
}
Plotly.newPlot(div, data, layout, config);

let i = 0;
var interval = setInterval(function () {
    i++;
    Plotly.extendTraces(div, {
        y: [
            [x1[i]],
            [x3[i]],
        ]
    }, [0, 1])

    if (i > 490) {
        clearInterval(interval)
    }
}, 1);

var stage = new Konva.Stage({
    container: 'container',
    width: 600,
    height: 600,
});

var layer = new Konva.Layer();

var tire = new Konva.Circle({
    x: 200,
    y: 250,
    radius: 40,
    fill: 'black'
});
var road = new Konva.Rect({
    x: 0,
    y: 300,
    width: 400,
    height: 10,
    fill: 'green',
});
var car = new Konva.Rect({
    x: 100,
    y: 130,
    width: 200,
    height: 50,
    fill: 'blue',
});

// layer.add(road);
layer.add(car);

// add the triangle shape to the layer
layer.add(tire);

// add the layer to the stage
stage.add(layer);

var carY = 130;
var m = 0;
var anim = new Konva.Animation(function (frame) {
    car.y(
        carY - ((x1[m]) * 1000)
    );
    tire.y(
        carY - ((x1[m]) * 1000) - (x3[m]) * 10000 + 120
    );
    m++;
    if (m > 480) {
        anim.stop();
    }
}, layer);

anim.start();