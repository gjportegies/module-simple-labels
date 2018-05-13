define([
    'jquery'
], function($){
    "use strict";
    $.widget('aimes.simpleLabels', {
        options: {
            labels: {}
        },

        _create: function() {
            var self =this;
            $.each(this.options.labels, function(i, item) {
               self._initLabel(item);
            });
        },

        _init: function() {
            console.log(this.options.labels);
        },

        _initLabel: function(label) {
            this.element.append('<canvas id="product-label-' + label.id + '" width="' + label.width + '" height="' + label.height + '"></canvas>');

            var canvas = $('#product-label-' + label.id);
            canvas.css('background-color', label.background);

            canvas = canvas.get(0);
            var ctx = canvas.getContext("2d");

            ctx.font = "14pt Open Sans";
            ctx.textAlign ="center";
            ctx.textBaseline ="middle";

            ctx.fillStyle = label.color;
            ctx.fillText(
                label.text,
                canvas.width / 2,
                canvas.height / 2
            );
        }
    });
    return $.aimes.simpleLabels;
});
