/**
 * Created by edwin on 11/7/15.
 */

$(document).ready(function(){

    $('#selectAllBoxes').click(function(event){

        if(this.checked) {

            $('.checkBoxes').each(function(){

                this.checked = true;

            });

        } else {


            $('.checkBoxes').each(function(){

                this.checked = false;

            });


        }

    });





    /**************** User Profile **********************/



    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

    //$('button').click(function(e) {
    //    e.preventDefault();
    //    alert("This is a demo.\n :-)");
    //});

    /*  for advertisement*/

    var 	width = 300,
        height = 250,
        frames = 2,
        currentFrame = 0, timesRun = 0,

        canvas = document.getElementById("myCanvas");
    ctx = canvas.getContext("2d");
    image = new Image();
    image.src = '/images/1554273312300X250.jpg';


    window.onload = function() {
        ctx.drawImage(image, 0, height * currentFrame, width, height, 0, 0, width, height);
    };

    function draw(){
        ctx.clearRect(0, 0, width, height);
        if(timesRun == 0) {
            currentFrame = 1;
        }
        ctx.drawImage(image, 0, height * currentFrame, width, height, 0, 0, width, height);
        if (currentFrame == frames) {
            currentFrame = 0;
        } else {
            currentFrame++;
        }
        timesRun ++;
        if(timesRun === 8){
            clearInterval(ad);
        }
    }
    var ad = setInterval(draw, 2800);


});