<template lang="pug">
    #heroes.container
        h1.header Heroes
        hr
        .box
            .col3
            .col6.center
                input(type="search" placeholder="search by name..." v-model="search")
            .col3
        .box    
            .col3.right.label Race 
            .col3.right
                select(v-model='search_race')
                    option(value="" selected) any
                    option(disabled) ---
                    option(value="sahi") sahi
                    option(value="ahomir") ahomir
            .col3
                select(v-model='search_subrace')
                    option(value="" selected) any
                    option(disabled) ---
                    option(value="skamat") skamat
                    option(value="salar") salar
                    option(value="riat") riat
            .col3.left.label  Subrace
        .box    
            .col3.right.label Gender 
            .col3.right
                select(v-model='search_gender')
                    option(value="" selected) any
                    option(disabled) ---
                    option(value="male") male
                    option(value="female") female
                    //option(value="irami") irami
                    //option(value="shelt") shelt
                    //option(value="andigma") andigma
            .col3
                select(v-model='search_faction')
                    option(value="" selected) any
                    option(disabled) ---
                    option(value="fiarr") fiarr
                    option(value="yatr") yatr
                    //option(value="enoh") enoh
                    //option(value="adamanta") adamanta
                    //option(value="darkness") darkness
            .col3.left.label  Faction
        //.box
            .col3
            .col6.center
                ul
                    li(@click="search_gender = ''") any
                    li(v-for="(gender, index) in genders" @click="search_gender = genders[index]") {{ gender }}
            .col3
        //.box
            .col3
            .col6.center
                ul
                    li(@click="search_faction = ''") any
                    li(v-for="(faction, index) in factions" @click="search_faction = factions[index]") {{ faction }}
            .col3
        //.debug(v-if='debug')
            hr
            h3 debug
            p name: {{ search }}
            p race: {{ search_race }}
            p subrace: {{ search_subrace }}
            p gender: {{ search_gender }}
            p faction: {{ search_faction }}
        hr
        .box
            .col.center.hero(v-for="(hero,index) in heroes" v-if="check(hero)" @click="info(index)") {{ hero.title }}
            
        .closer(v-if="text_hero" @click="close")
        h2.title(v-if="text_hero") {{ text_hero }}
        p.text(v-if="text_hero")
            span.white Race: 
            span {{ text_race }}   
            span |   
            span.white Subrace: 
            span {{ text_subrace }}   
            span |   
            span.white Gender: 
            span {{ text_gender }}   
            span |   
            span.white Faction: 
            span {{ text_faction }}   
        p.text(v-if="text_hero")
            span.white Bio: 
        div.text(v-if="text_hero") {{ text_bio }}
</template>

<script>
    var heroes = require('../data/heroes.js')
    
    function clear() {
        alert('te');
    }

    module.exports = {
        data: function() {
            return {
                debug: true,
                search: '',
                genders: ['male', 'female', 'irami', 'shelt', 'andigma'],
                factions: ['fiarr', 'yatr', 'enoh', 'adamanta', 'darkness'],
                heroes: heroes,
                text_hero: '',
                text_race: '',
                text_subrace: '',
                text_gender: '',
                text_faction: '',
                text_bio: '',
                search_race: '',
                search_subrace: '',
                search_gender: '',
                search_faction: ''
            }
        },
        computed: {
            text_bio_advanced: function() {
                let input = this.text_bio;
                input = input.split("\\");
                let output = '';
                input.map(function(p){ output += '<p>'+p+'</p>' })
//                let output = input.map(function(p){ return '<p>'+p+'</p>' })
//                return this.text_bio.replace(/\\/g,"<br/>");
//                return this.text_bio.split("\\").join('<br/>');
                return output;
            }
        },
        methods: {
            info: function(index) {
                this.text_hero = this.heroes[index].title;
                this.text_race = this.heroes[index].race;
                this.text_subrace = this.heroes[index].subrace;
                this.text_gender = this.heroes[index].gender;
                this.text_faction = this.heroes[index].faction;
                this.text_bio = this.heroes[index].bio;
            },
            close: function() {
                this.text_hero = '';
                this.text_bio = '';
            },
            check: function(hero) {
                let search_points = 0;
                if ( hero.title.toLowerCase().indexOf(this.search.toLowerCase()) != -1 ) { search_points += 1 }
                if ( hero.race.toLowerCase().indexOf(this.search_race.toLowerCase()) != -1 ) { search_points += 1 }
                if ( hero.subrace.toLowerCase().indexOf(this.search_subrace.toLowerCase()) != -1 ) { search_points += 1 }
                if ( hero.gender.toLowerCase() == this.search_gender.toLowerCase() ) { search_points += 1 }
                if ( this.search_gender == "" ) { search_points += 1 }
                if ( hero.faction.toLowerCase() == this.search_faction.toLowerCase() ) { search_points += 1 }
                if ( this.search_faction == "" ) { search_points += 1 }
                if ( search_points == 5 ) { return true } else { return false }
            }
        },
        created: function() {
//            this.info(0)
        }
    }
    
    
</script>

<style lang="less">
    .col3 {
/*        background-color: red;*/
    }
    #heroes {
        input,select {
            width: 400px;
            font-size: 16px;
            background-color: transparent;
            border: none;
            border: 1px solid white;
            border-radius: 5px;
            color: white;
            padding: 10px 10px;
            margin: 0 auto;
        }
        
        input {
            width: 400px;
            width: calc(100% + 1px);
        }
        select {
            width: 220px;
            width: 100%;
            background: transparent;
            -webkit-appearance: none;
            option {
                background-color: black;
            }
        }
        
        ul {
            list-style: none;
            margin: 0;
            padding: 0;
            li {
                display: inline-block;
                font-size: 20px;
                padding-left: 10px;
                padding-right: 10px;
                transition: 0.25s ease;
                &:hover {
                    color: white;
                    cursor: pointer;
                }
            }
        }
        
        .hero {
            border-bottom: 2px solid #999;
            transition: 0.25s ease;
            &:hover {
                color: white;
                border-color: white;
                cursor: pointer;
            }
        }
        
        .closer {
            background-image: url(../img/close.png);
            background-size: 100%;
            width: 28px;
            height: 28px;
            position: relative;
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
        div.text {
            margin-top: 20px;
            color: #999;
            font-size: 20px;
        }
        
        .white {
            color: white;
        }
        .label {
            padding-top: 14px;
        }
    }

</style>
