define([
    'jquery'
], function($){
    "use strict";
    $.widget('aimes.simpleLabels', {
        options: {
            labels: {
                newLabel: {
                    id: 'new',
                    text: 'NEW',
                    color: '#FFFFFF',
                    background: '#222222',
                    width: 100,
                    height: 30
                },
                saleLabel: {
                    id: 'sale',
                    text: 'SALE',
                    color: '#FF0000',
                    background: '#AB8F8E',
                    width: 100,
                    height: 30
                }
            }
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