<template lang="pug">
    #races.container
        #darker
        h1.header Races
        hr
        .box
            .col2.center(v-for="(race, index_race) in races")
                img(src="../img/race.png" @click="show_race(index_race)")
                h2(@click="show_race(index_race)") {{ race.title }}
                hr
                ul
                    li(v-bind:id="index_race" v-for="(subrace, index_subrace) in race.subraces" @click="show_subrace(index_subrace, $event)" ) {{ subrace.title }}
        hr(v-if="race")
        .closer(v-if="race" @click="close")
        h2.title(v-if="!subrace") {{ race }}
        h2.title(v-if="subrace") {{ race }}   |   {{ subrace }}
        p.text {{ text }}
</template>

<script>
    var races = require('../data/races.js')

    module.exports = {
        data: function() {
            return {
                races: races,
                race: '',
                subrace: '',
                text: ''
            }
        },
        methods: {
            show_race: function(index) {
                this.race = this.races[index].title;
                this.subrace = false;
                this.text = this.races[index].body;
            },
            show_subrace: function(index_subrace, event) {
                let atr1 = event.currentTarget.id;
                let atr2 = index_subrace;
                this.race = this.races[atr1].title;
                this.subrace = this.races[atr1].subraces[atr2].title;
                this.text = this.races[atr1].subraces[atr2].body;
            },
            close: function() {
                this.race = '';
                this.subrace = '';
                this.text = '';
            }
        },
        created: function() {
            console.log('created');
        }
    }
    
    
</script>

<style lang="less">
    #races {
        .box {
            margin-top: 20px;
            img {
                width: 84px;
                cursor: pointer;
            }
            h2 {
                font-weight: 300;
                font-size: 28px;
                margin-top: 12px;
                padding-top: 4px;
                color: #999;
                &:hover {
                    color: white;
                    cursor: pointer;
                }
            }
            hr {
                margin-top: 11px;
                width: 95px;
            }
            ul {
                margin: 0;
                padding: 0;
                text-align: center;
                list-style: none;
                margin-top: 20px;
                li {
                    font-weight: 300;
                    font-size: 20px;
                    color: #999;
                    padding-bottom: 6px;
                    &:hover {
                        color: white;
                        cursor: pointer;
                    }
                }
            }
        }

        .closer {
            background-image: url(../img/close.png);
            background-size: 100%;
            width: 28px;
            height: 28px;
            position: relative;
/*            left: 920px;*/
/*            top: -40px;*/
            top: 64px;
            cursor: pointer;
            float: right;
        }
        
        h2.title {
            margin-top: 66px;
            font-size: 30px;
            font-weight: 300;
            color: white;
        }

        p.text {
            margin-top: 20px;
            color: #999;
            font-size: 20px;
        }
    }

</style>
