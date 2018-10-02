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
                    <canvas id="myCanvas" ref="myCanvas" resize>

                    </canvas>
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
            /*this.$nextTick( function (){

            })*/
            //this.drawWindowId = this.$refs['myCanvas'];
        },
        created(){
            console.log(this.displayState);

            console.log(this.displayState);
            setTimeout(this.toggleCurveWindow, 3000);
        },
        methods:{
            toggleCurveWindow: function(){
                this.displayState = true;
                this.drawWindow();
            },
            drawWindow: function(){
                //console.log(paper);
                //paper.install(window);
                $(function() {
                    //console.log(this.drawWindowId);
                    var canvas = document.getElementById('myCanvas');
                    //console.log(canvas);
                    paper.setup(canvas);
                    var path = new paper.Path();
                    path.strokeColor = 'black';
                    var start = new paper.Point(100, 100);
                    path.moveTo(start);
                    path.lineTo(start.add([ 200, -50 ]));
                    paper.view.draw();
                });

            }
        }
    }
</script>

<style scoped>

</style>