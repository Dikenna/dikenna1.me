Skip to content
This repository
Search
Pull requests
Issues
Marketplace
Explore
 @Dikenna
 Sign out
 Watch 12
  Star 153  Fork 27 comdan66 / weather
 Code Issues 3 Pull requests 0 Projects 0 Wiki Insights   
Branch: master Find file Copy pathweather / template /index.php
741e1b9  on Jul 17, 2016
@ comdan66 comdan66 Fix code sync OAF2E version 3.3.
1 contributor
Raw Blame History     
159 lines (136 sloc)  7.68 KB
<! DOCTYPE html>
< html  lang = " tw " >
  < head >
    < meta  http-equiv = " Content-Language "  content = " zh-tw " />
    < meta  http-equiv = " Content-type "  content = " text / html; charset = utf-8 " />
    < meta  name = " viewport "  content = " width = device-width, initial-scale = 1, maximum-scale = 1, user-scalable = no, minimal-ui " />

    < title > <? php echo $ title = TITLE ; ? > </ title >    

    < meta  name = " robots "  content = " index, follow " />

    < meta  name = " keywords "  content = " <? php echo KEYWORDS ; ? > "   />
    < meta  name = " description "  content = " <? php echo mb_strimwidth ( $ description = ' Want to check the weather in every place? With the Google Maps API's map service and the weather forecast of the Central Weather Bureau, it's quick and easy Weather Information of 368 Towns in Taiwan! Use the weather forecast information published on the website of the Central Weather Bureau as an information source, and update the latest weather profile every 30 minutes on average, showing the temperature and humidity, sunrise and sunset time, special forecast .. and so on. ' , 0 , 150 , ' ... ' , ' UTF-8 ' ); ? > "     />
    < meta  property = " og: site_name "  content = " <? php echo $ title ; ? > "   />
    < meta  property = " og: url "  content = " <? php echo URL_INDEX ; ? > "   />
    < meta  property = " og: title "  content = " <? php echo $ title ; ? > "   />
    < Meta  Property = " OG: Description "  Content = " ? <PHP echo mb_strimwidth ( preg_replace ( " / \ S + / U " , " " , $ Description ), 0 , 300 , ' ... ' , ' UTF-. 8 ' ) ; ? > "   />
    < meta  property = " fb: admins "  content = " <? php echo FB_ADMIN_ID ; ? > "   />
    < meta  property = " fb: app_id "  content = " <? php echo FB_APP_ID ; ? > "   />
    < meta  property = " og: locale "  content = " zh_TW " />
    < meta  property = " og: locale: alternate "  content = " en_US " />
    < meta  property = " og: type "  content = " article " />
    < meta  property = " article: author "  content = " <? php echo OA_FB_URL ; ? > "   />
    < meta  property = " article: publisher "  content = " <? php echo OA_FB_URL ; ? > "   />
    < meta  property = " article: modified_time "  content = " <? php echo date ( ' c ' ); ? > "   />
    < meta  property = " article: published_time "  content = " <? php echo date ( ' c ' ); ? > "   />
    < meta  property = " og: image "  content = " <? php echo URL_OG_INDEX ; ? > "    alt = " <? php echo $ title ; ? > "   />
    < meta  property = " og: image: type "  tag = " larger "  content = " image / <? php echo pathinfo ( URL_OG_INDEX , PATHINFO_EXTENSION ); ? > "   />
    < meta  property = " og: image: width "  content = " 1200 " />
    < meta  property = " og: image: height "  content = " 630 " />

    < link  rel = " canonical "  href = " <? php echo URL_INDEX ; ? > "   />
    < link  rel = " alternate "  href = " <? php echo URL_INDEX ; ? > "    hreflang = " zh-Hant " />

    < link  href = ' https://fonts.googleapis.com/css?family=Comfortaa:400,300,700 '  rel = ' stylesheet '  type = ' text / css ' >
<? php foreach ( Min :: css ( ' / css / public ' . CSS , ' / css / index ' . CSS ) as $ path ) { ? >      
        < link  href = " <? php echo PROTOCOL . BUCKET . ' / ' . NAME . $ path ; ? > "            rel = " stylesheet "  type = " text / css " />
<? php } ? >

    < script  src = " https://maps.googleapis.com/maps/api/js?key=AIzaSyDwwd8RtByLxQJcAnt8JMzznijiTPnelyA & v = 3.exp & sensor = false & language = zh-TW "  language = " javascript "  type = " text / javascript " > < / script >
<? php foreach ( Min :: js ( ' / js / public ' . JS , ' / js / index ' . JS ) as $ path ) { ? >      
        < script  src = " <? php echo PROTOCOL . BUCKET . ' / ' . NAME . $ path ; ? > "            language = " javascript "  type = " text / javascript " > < / script >
<? php } ? >
    < script  type = " application / ld + json " >
<? php echo json_encode (array (
        '@context' => 'http://schema.org', '@type' => 'Article',
        'mainEntityOfPage' => array (
          '@type' => 'WebPage',
          '@id' => URL_INDEX),
        'headline' => $ title,
        'image' => array ('@type' => 'ImageObject', 'url' => URL_OG_INDEX, 'height' => 630, 'width' => 1200),
        'datePublished' => date ('c'),
        'dateModified' => date ('c'),
        'author' => array (
            '@type' => 'Person', 'name' => OA, 'url' => OA_URL,
            'image' => array ('@type' => 'ImageObject', 'url' => avatar_url (OA_FB_UID, 300, 300), 'height' => 300, 'width' => 300)
          ),
        'publisher' => array (
            '@type' => 'Organization', 'name' => TITLE,
            'logo' => array ('@type' => 'ImageObject', 'url' => URL_IMG. 'amp_title.png', 'width' => 600, 'height' => 60)
          ),
        'description' => mb_strimwidth ($ description, 0, 150, '...', 'UTF-8')
      ), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);?>
    </ script >
  </ head >
  < body  lang = " zh-tw " >
    
    <? php echo $ _header ; ? >  

    < div  class = ' _scope '  itemscope  itemtype = " http://data-vocabulary.org/Breadcrumb " >
      < A  itemprop = " URL "  the href = ' <PHP? Echo URL_INDEX ; ? > '   > < Span  itemprop = " title " > <PHP? Echo preg_replace ( "/ \. + /" , " " , ' Home ' ); ? > </ span > </ a >  
    </ div >

    < div  id = ' container ' >

      < div  class = ' towns ' >
  <? php foreach ( $ cards as $ card ) {   
        $ town  =  $ card [ ' town ' ]; ? >
          < div >
            < A  the href = ' <PHP? Echo $ Town [ ' Link ' ]; ? > '    Class = ' _i ' >
              < img  src = ' <? php echo $ town [ ' img ' ]; ? > '   />
              < div > <? php echo $ card [ ' title ' ] . ' - ' . $ town [ ' name ' ]; ? > </ div >     
            </ a >
            < A  the href = ' <PHP? Echo $ Town [ ' Link ' ]; ? > '   >
              < figure  data-temperature = ' <? php echo $ town [ ' weather ' ] [ ' temperature ' ]; ? > '   >
                < img  src = " <? php echo $ town [ ' weather ' ] [ ' img ' ]; ? > "   />
                < figcaption > <? php echo $ town [ ' name ' ]; ? > </ figcaption >  
              </ figure >
              < div >
                < span > <? php echo $ town [ ' weather ' ] [ ' desc ' ]; ? > </ span >  
                < div > < span > < p > Humidity </ p > < p >: </ p > < p > <? php echo $ town [ ' weather ' ] [ ' humidity ' ]; ? > % </ p > < / span > </ div >  
                < div > < span > < p > Rainfall </ p > < p >: </ p > < p > <? php echo $ town [ ' weather ' ] [ ' rainfall ' ]; ? > mm </ p > < / span > </ div >  
                < Time  datetime = ' <PHP? Echo $ Town [ ' Weather ' ] [ ' AT ' ]; ? > '   > <PHP? Echo $ Town [ ' Weather ' ] [ ' AT ' ]; ? > < Time >  
              </ div >
            </ a >
          </ div >  
  <? php } ? >
        
        < div  id = ' add ' >
          < i > </ i > < i > </ i > < i > </ i > < i > </ i >
          < span > Add Follow Tracking Area! </ span >
        </ div >

      </ div >

      < div  class = ' questions ' >
  <? php foreach ( $ questions as $ question ) { ? >   
          < article >
            < header > <? php echo $ question [ ' title ' ]; ? > </ header >  
            < section >
              < p > <? php echo $ question [ ' desc ' ]; ? > </ p >  
            </ section >
            < A  the href = ' <PHP? Echo $ Question [ ' Town ' ] [ ' Link ' ]; ? > '   > <PHP? Echo $ Question [ ' text ' ]; ? > </ A >  
          </ article >
  <? php } ? >
      </ div >

<? php if ( $ specials ) { ? > 
        < Div  class = ' Specials <PHP? Echo COUNT ( $ Specials ) < . 3 ? COUNT ( $ Specials ) < 2 ? ' N1 ' : ' N2 ' : ' ' ; ? > '     >
    <? php foreach ( $ specials as $ special ) { ? >   
            < article >
              < header > <? php echo $ special [ ' special ' ] [ ' title ' ]; ? > - <? php echo $ special [ ' special ' ] [ ' status ' ]; ? > </ header >    

              < section  class = ' desc ' >
                < p > < span > < img  src = ' <? php echo $ special [ ' special ' ] [ ' img ' ]; ? > '   > </ span > <? php echo $ special [ ' special ' ] [ ' desc ' ]; ? > </ p >  
                < p > The following are the counties, towns and villages that issue the special rainstorm: </ p >
              </ section >

        <? php foreach ( $ special [ ' cates ' ] as $ cate ) { ? >  
                < section  class = ' cate ' >
                  < Header > < A  the href = ' ? <PHP echo URL_ALL . ' # ' . (Url_encode $ Cate [ ' name ' ]); ? > '      > <? PHP echo $ Cate [ ' name ' ]; ? > </ A > </ header >  
            <? php foreach ( $ cate [ ' towns ' ] as $ town ) ?? >  
                    < A  the href = ' <PHP? Echo $ Town [ ' Link ' ]; ? > '   > <PHP? Echo $ Town [ ' name ' ]; ? > </ A >  
            <? php } ? >
                </ section >
        <? php } ? >
            
              < Time  datetime = ' <PHP? Echo $ Special [ ' Special ' ] [ ' AT ' ]; ? > '   > <PHP? Echo $ Special [ ' Special ' ] [ ' AT ' ]; ? > </ Time >  

            </ article >
    <? php } ? >
        </ div >
<? php } ? >
    </div>

    <?php echo $_aside;?>
    <?php echo $_footer;?>

    <div id='weathers'>
<?php foreach ($hiddens as $hidden) { ?>
        <a href='<?php echo $hidden['l'];?>' data-val='<?php echo json_encode ($hidden);?>' data-id='<?php echo $hidden['i'];?>' data-code='<?php echo $hidden['p'];?>' title='<?php echo $hidden['c'] . ' ' . $hidden['n'];?>'><?php echo $hidden['c'] . ' ' . $hidden['n'];?></a>
<?php } ?>
    </ div >

    < div  id = ' fb-root ' > </ div >

  </ body >
</ html >
© 2017 GitHub , Inc.
Terms
Privacy
Security
Status
Help
Contact GitHub
API
Training
Shop
Blog
About