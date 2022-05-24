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