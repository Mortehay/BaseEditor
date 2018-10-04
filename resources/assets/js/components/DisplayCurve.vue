<template>
       <div id="test-curve">

        <div class="row justify-content-center">

            <div class="col-md-8">
                <h1>
                    test page
                </h1>
                <div class="card card-default curve-window" v-if="displayState">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                    <canvas id="myCanvas" style="width:400px; height:400px" resize></canvas>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "test",
        data(){
            return {
                element: [1,2,3,4,5,6],
                displayState: false,
                drawWindowId:null
            };
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            console.log(this.displayState);
            setTimeout(this.toggleCurveWindow, 500);
            console.log(this.displayState);

        },
        methods:{
            toggleCurveWindow: function(){
                this.displayState = true;
                this.drawWindow();
            },
            drawWindoeBorder: function(){
                $(function(){
                    $('#myCanvas').css({'border': '1px solid black', 'margin':'0 auto'});
                });
            },
            drawWindow: function(){
                paper.install(window);
                var __this = this;
                var paperSetup = paper.setup(document.getElementById('myCanvas'));
                $(function(){

                    var tool = new Tool();
                    var path;

                    tool.onMouseDown = function(event) {
                        path = new Path();
                        path.strokeColor = 'blue';
                        path.add(event.point);
                    }

                    tool.onMouseDrag = function(event) {
                        path.add(event.point);
                    }
                    __this.drawPoligon(paperSetup, tool);
                });
            },
            drawPoligon: function(paperSetup, tool){
                $(function(){
                    var myCanvasSize = {height:400, width:400};
                    paper.install(window);
                    paper.setup(document.getElementById('myCanvas'));
                    var  decagonPosition = {xPath: 200, yPath: 70};
                    var decagon = new Path.RegularPolygon(new Point(decagonPosition.xPath, decagonPosition.yPath), 10, 50);
                    decagon.fillColor = '#e9e9ff';
                    decagon.selected = true;

                    view.onFrame = function(event) {
                        // Each frame, rotate the path by 3 degrees:
                        decagon.rotate(3);paper.view.draw();
                        decagon.fillColor.hue += 1;
                    }
                    tool.onKeyDown = function(event, paper) {
                        if (event.key == 'd' && decagon.position.x < myCanvasSize.width ) {
                            decagon.position.x += 5;
                            return false;
                        }
                        if (event.key == 'a' && decagon.position.x > 0) {
                            decagon.position.x -= 5;
                            return false;
                        }
                        if (event.key == 'w' && decagon.position.y > 0) {
                            decagon.position.y -= 5;
                            return false;
                        }
                        if (event.key == 's'  && decagon.position.y< myCanvasSize.height) {
                            decagon.position.y += 5;
                            return false;
                        }
                    }
                    return decagon;

                });
            }

        }
    }
</script>

<style scoped>

</style>