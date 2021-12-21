/*
SQLyog Enterprise - MySQL GUI v7.02 
MySQL - 5.0.51b-community-nt : Database - rpmesregion1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`rpmesregion1` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `rpmesregion1`;

/*Table structure for table `acknowledgement` */

DROP TABLE IF EXISTS `acknowledgement`;

CREATE TABLE `acknowledgement` (
  `agency` int(11) NOT NULL,
  `quarter` int(11) default NULL,
  `findings` text,
  `action` text,
  `isRead` int(11) default NULL,
  `year` year(4) default NULL,
  KEY `FK_acknowledgement` (`agency`),
  CONSTRAINT `FK_acknowledgement` FOREIGN KEY (`agency`) REFERENCES `tblagency` (`agencyid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `acknowledgement` */

LOCK TABLES `acknowledgement` WRITE;

insert  into `acknowledgement`(`agency`,`quarter`,`findings`,`action`,`isRead`,`year`) values (971,2,NULL,NULL,0,2016),(2,3,'ksadhfkjsdhfkjsd','dshfkjshdf\r\n',1,2016);

UNLOCK TABLES;

/*Table structure for table `acknowledgementexc` */

DROP TABLE IF EXISTS `acknowledgementexc`;

CREATE TABLE `acknowledgementexc` (
  `agency` int(11) NOT NULL,
  `quarter` int(11) default NULL,
  `findings` text,
  `action` text,
  `isRead` int(11) default NULL,
  `year` year(4) default NULL,
  KEY `FK_acknowledgementexc` (`agency`),
  CONSTRAINT `FK_acknowledgementexc` FOREIGN KEY (`agency`) REFERENCES `tblagency` (`agencyid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `acknowledgementexc` */

LOCK TABLES `acknowledgementexc` WRITE;

UNLOCK TABLES;

/*Table structure for table `acknowledgementmoni` */

DROP TABLE IF EXISTS `acknowledgementmoni`;

CREATE TABLE `acknowledgementmoni` (
  `agency` int(11) NOT NULL,
  `findings` text,
  `action` text,
  `isRead` int(11) default NULL,
  `year` int(4) default NULL,
  KEY `FK_acknowledgemoni` (`agency`),
  CONSTRAINT `FK_acknowledgemoni` FOREIGN KEY (`agency`) REFERENCES `tblagency` (`agencyid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `acknowledgementmoni` */

LOCK TABLES `acknowledgementmoni` WRITE;

insert  into `acknowledgementmoni`(`agency`,`findings`,`action`,`isRead`,`year`) values (2,'dfdfdf','dfdfd',1,2016);

UNLOCK TABLES;

/*Table structure for table `hits` */

DROP TABLE IF EXISTS `hits`;

CREATE TABLE `hits` (
  `id` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hits` */

LOCK TABLES `hits` WRITE;

insert  into `hits`(`id`) values ('091k64v7u85jevkq82k0o2piu1'),('0kd1dgu3pm3qstljgip90ouj76'),('0n08bglofp015truhd696m55q6'),('100036'),('100586'),('100677'),('101288'),('101318'),('102539'),('103210'),('103241'),('103378'),('103531'),('103714'),('103836'),('103958'),('10406'),('104355'),('104644'),('104965'),('105194'),('105301'),('105316'),('106949'),('106994'),('107681'),('107834'),('107879'),('107956'),('108185'),('108368'),('108413'),('108459'),('10849'),('108810'),('10g3096svb42jqhu28lgj5qfc2'),('110550'),('110946'),('111740'),('112060'),('112594'),('112716'),('113189'),('114975'),('115188'),('115646'),('115875'),('116119'),('116623'),('116714'),('117340'),('118149'),('118606'),('11871'),('119522'),('119552'),('119629'),('120056'),('120163'),('120376'),('120529'),('120682'),('120956'),('12100'),('122162'),('122497'),('122711'),('122818'),('122894'),('123062'),('123153'),('123459'),('123611'),('123642'),('124481'),('124603'),('124649'),('12512'),('125274'),('126327'),('126373'),('126709'),('126831'),('126953'),('12756'),('127945'),('128982'),('129211'),('1296'),('13000'),('130432'),('130798'),('131012'),('131027'),('131058'),('131637'),('131714'),('131897'),('132019'),('132797'),('133438'),('134262'),('135071'),('135345'),('135788'),('13595'),('136398'),('137085'),('137451'),('137619'),('137893'),('138229'),('138504'),('138839'),('139572'),('14007'),('140930'),('141525'),('142975'),('143478'),('143509'),('143661'),('143677'),('144211'),('144821'),('144989'),('145279'),('145431'),('14633'),('146393'),('146652'),('146789'),('146850'),('147247'),('147384'),('14740'),('148208'),('148544'),('148620'),('148666'),('148681'),('148834'),('149246'),('149322'),('149338'),('149383'),('150284'),('151291'),('151703'),('151962'),('152084'),('152237'),('152557'),('152603'),('152649'),('152954'),('153244'),('153396'),('153457'),('153534'),('154342'),('15441'),('154968'),('15502'),('15548'),('155639'),('155655'),('156463'),('156631'),('156723'),('157348'),('157440'),('15792'),('158508'),('15914'),('159256'),('159958'),('160492'),('160599'),('161377'),('162826'),('162842'),('163559'),('163940'),('164337'),('164368'),('164657'),('164978'),('165298'),('165405'),('166565'),('167221'),('167572'),('168396'),('168609'),('168823'),('168838'),('169052'),('169235'),('169403'),('169510'),('16967'),('169876'),('170151'),('170227'),('170669'),('17074'),('170761'),('171020'),('171036'),('17135'),('171387'),('172363'),('17242'),('172439'),('17257'),('173294'),('173462'),('173889'),('174835'),('17501'),('175125'),('175445'),('175567'),('176086'),('176315'),('176742'),('178314'),('17837'),('178558'),('179718'),('1800'),('180298'),('181473'),('182525'),('182892'),('183288'),('186020'),('186310'),('187363'),('18737'),('187622'),('188171'),('188187'),('188232'),('188492'),('18859'),('188614'),('188660'),('188705'),('189194'),('189911'),('190002'),('190399'),('190857'),('191391'),('19149'),('19180'),('192215'),('192764'),('192856'),('19378'),('194366'),('194443'),('194504'),('19454'),('196091'),('196136'),('196335'),('196442'),('196609'),('197327'),('197922'),('198196'),('198639'),('199173'),('199249'),('199463'),('199936'),('1ivps3l50ll1ipql25ocfiuij4'),('1k1t0mq9qlt49oke0fnqomap01'),('1lv44mktcm1p6foloko2icm1g2'),('1rnbclo083gh9766g8t9jqgk06'),('200195'),('201050'),('201294'),('201462'),('201858'),('202148'),('202316'),('202743'),('203140'),('203644'),('20370'),('20385'),('205261'),('205734'),('206192'),('206589'),('208023'),('208832'),('20996'),('210113'),('210220'),('210541'),('211304'),('212158'),('212250'),('212662'),('213211'),('213409'),('213623'),('213898'),('21408'),('214416'),('214630'),('214889'),('214966'),('215240'),('215286'),('215317'),('215439'),('215530'),('216492'),('218094'),('218338'),('218780'),('219101'),('21972'),('21flvj33fmsc2bf51dbom3ffs5'),('220215'),('221039'),('221191'),('221268'),('221344'),('221795dl4hkpsgtcdhqr67lua1'),('221954'),('222153'),('222549'),('222595'),('222809'),('223175'),('223770'),('224411'),('224426'),('224518'),('225311'),('225418'),('225967'),('226410'),('226562'),('226639'),('226944'),('227066'),('227264'),('227600'),('22781'),('228180'),('228516'),('229050'),('229202'),('229217'),('229858'),('229935'),('23025'),('230514'),('231415'),('232498'),('232941'),('233215'),('233429'),('23361'),('23452'),('234695'),('235123'),('235336'),('236145'),('236542'),('236755'),('236832'),('237045'),('237167'),('237518'),('237854'),('238052'),('238159'),('238312'),('239014'),('240448'),('240845'),('241104'),('241348'),('241501'),('24231'),('242706'),('242874'),('243759'),('244369'),('244614'),('244675'),('244919'),('244934'),('245300'),('246429'),('246597'),('24719'),('247864'),('249985'),('25024'),('250244'),('251038'),('251053'),('251434'),('251450'),('25146'),('251602'),('252304'),('252472'),('252960'),('25314'),('253769'),('253860'),('253876'),('25390'),('25466'),('25512'),('255142'),('25543'),('255539'),('256180'),('25634'),('256454'),('256546'),('256653'),('256775'),('256882'),('256912'),('257645'),('257721'),('257843'),('258926'),('259216'),('25955'),('259583'),('260040'),('260391'),('260513'),('260544'),('260651'),('261292'),('261353'),('261887'),('261902'),('262238'),('262482'),('26260'),('262924'),('262939'),('263077'),('263351'),('263367'),('264053'),('264404'),('265854'),('267105'),('26718'),('267304'),('267517'),('268189'),('268250'),('268372'),('268387'),('269043'),('269257'),('269669'),('269699'),('270020'),('270096'),('270218'),('270905'),('271164'),('271210'),('271301'),('271927'),('271942'),('272003'),('272430'),('27267'),('272797'),('2731'),('27343'),('273727'),('273911'),('274078'),('274948'),('275269'),('276505'),('276871'),('277924'),('27969'),('280aik14u7hp4pmo7soh0a8p91'),('281357'),('281769'),('282074'),('282181'),('28259'),('283218'),('28335'),('283890'),('284409'),('284622'),('28518'),('285355'),('285507'),('285523'),('286636'),('286758'),('287247'),('287506'),('288101'),('288239'),('288864'),('290802'),('290924'),('291061'),('29129'),('292191'),('29220'),('29281'),('2929'),('293030'),('293228'),('293854'),('293930'),('294083'),('294540'),('294815'),('294891'),('295548'),('29571'),('296570'),('297409'),('297424'),('297562'),('298142'),('298187'),('299103'),('299652'),('2hsp23uvbrrbt5j91bbgq689h2'),('2mn0ckpklqfpibcrvorogb21u7'),('2q31onhfo97mkt4o6s873a7g52'),('300064'),('30044'),('301025'),('301544'),('301590'),('301697'),('301758'),('301865'),('301911'),('301941'),('303208'),('303574'),('304077'),('304825'),('305115'),('30532'),('30578'),('306305'),('306381'),('306748'),('306976'),('308579'),('308777'),('309372'),('30a8lmfa091qvnrgh3a0a70qj6'),('310150'),('31051'),('311417'),('31204'),('312348'),('312378'),('312439'),('312698'),('31311'),('31326'),('313446'),('313721'),('314545'),('314606'),('316467'),('31677'),('316864'),('317063'),('317124'),('317429'),('317551'),('317658'),('31845'),('318710'),('318848'),('318924'),('319458'),('319534'),('320023'),('32013'),('320175'),('320526'),('320862'),('320892'),('321152'),('321503'),('321777'),('321900'),('321915'),('322403'),('324295'),('324433'),('324875'),('325363'),('326172'),('326599'),('326615'),('326813'),('327057'),('327255'),('327576'),('327683'),('327713'),('327896'),('328125'),('328278'),('328736'),('32974'),('329865'),('329926'),('330155'),('330368'),('330704'),('332138'),('33248'),('332504'),('332688'),('333130'),('333176'),('333389'),('333466'),('333527'),('333695'),('333817'),('334366'),('335556'),('335907'),('336029'),('336868'),('337753'),('337845'),('338150'),('339981'),('340042'),('34006sb38lmo9tcjvk8l64rc94'),('340073'),('341263'),('343170'),('343292'),('343491'),('344559'),('345276'),('346619'),('346741'),('346802'),('346878'),('347367'),('348252'),('348328'),('348953'),('34896'),('349243'),('349732'),('349976'),('350357'),('351608'),('351807'),('351914'),('352524'),('352646'),('353058'),('353119'),('353317'),('35339'),('353501'),('353974'),('354233'),('354462'),('354569'),('354782'),('355744'),('356079'),('356720'),('356858'),('35705'),('357071'),('357514'),('357559'),('358582'),('358734'),('359040'),('359741'),('359772'),('359787'),('360703'),('360764'),('361038'),('361557'),('361801'),('36224'),('36239'),('362824'),('363297'),('363404'),('363693'),('363861'),('36438'),('364502'),('364670'),('365128'),('365418'),('365769'),('365860'),('366165'),('367386'),('367523'),('367600'),('368180'),('368531'),('368576'),('368714'),('368927'),('36972'),('36nrqoq688kr6qfqf0dul2les3'),('370178'),('370407'),('370438'),('370499'),('370606'),('371506'),('371582'),('371948'),('3723'),('372483'),('372589'),('373474'),('373825'),('374222'),('374710'),('375138'),('376541'),('376648'),('376923'),('377075'),('377716'),('377976'),('378296'),('378388'),('378998'),('380112'),('380600'),('381531'),('382355'),('382492'),('383072'),('383255'),('38330'),('383683'),('384934'),('385117'),('385590'),('38665'),('387009'),('387039'),('387223'),('387558'),('388382'),('390305'),('391098'),('391342'),('39184'),('391922'),('392121'),('392533'),('392716'),('392746'),('392914'),('393280'),('393708'),('393906'),('394730'),('394806'),('394959'),('395233'),('395478'),('395935'),('395951'),('396042'),('396088'),('396988'),('397187'),('397446'),('398896'),('3knm5u8ck19omtrahd1vucigq4'),('3rg5d0s5n8dm78gqjhb0aidhu6'),('400482'),('401367'),('401886'),('402054'),('402146'),('402253'),('402634'),('403168'),('403321'),('404160'),('404236'),('404511'),('404679'),('404847'),('404938'),('405487'),('406754'),('406830'),('407379'),('408524'),('409058'),('40954'),('409790'),('40985'),('409851'),('409989'),('410294'),('411652'),('411774'),('412094'),('412155'),('412171'),('413361'),('415222'),('415436'),('415497'),('415726'),('415863'),('416626'),('416779'),('41687'),('417420'),('417740'),('417771'),('417939'),('418320'),('418503'),('419281'),('419434'),('41mj0iqa2eaef7nkt3mrkhtdq3'),('420075'),('420410'),('420731'),('420853'),('421967'),('422058'),('42297'),('423584'),('424073'),('424195'),('42450'),('425370'),('425782'),('427048'),('427109'),('427262'),('427353'),('427735'),('427811'),('427994'),('428284'),('428299'),('429398'),('42984'),('430008'),('4302'),('432038'),('433670'),('433747'),('433869'),('434601'),('435273'),('435456'),('435608'),('436005'),('436493'),('436768'),('437027'),('437134'),('437226'),('437394'),('437943'),('438279'),('438385'),('438416'),('438523'),('439057'),('439179'),('439484'),('439560'),('440049'),('440201'),('440689'),('440812'),('441788'),('44265'),('442749'),('443131'),('443375'),('443451'),('444016'),('444672'),('445099'),('446167'),('446793'),('448258'),('448410'),('448777'),('448975'),('449158'),('449799'),('450287'),('451523'),('4516'),('451722'),('451828'),('452225'),('452424'),('452591'),('453461'),('453965'),('453995'),('454132'),('455948'),('456040'),('456223'),('45639'),('456krmde7cg6vcg7559ssbn124'),('457261'),('457673'),('458085'),('458954'),('459015'),('459275'),('460312'),('460419'),('460679'),('461609'),('462098'),('462906'),('463318'),('46371'),('464295'),('464402'),('464508'),('464936'),('464951'),('465592'),('465882'),('466599'),('468659'),('469239'),('470566'),('470688'),('471589'),('471772'),('472168'),('472702'),('472916'),('473664'),('474198'),('474366'),('474854'),('475541'),('475815'),('476136'),('476517'),('477128'),('477356'),('477921'),('478547'),('47866'),('478699'),('4791'),('480286'),('480927'),('481064'),('48126'),('48156'),('481568'),('481843'),('48233'),('483277'),('483338'),('483689'),('4837'),('484025'),('484162'),('484726'),('485459'),('485566'),('485611'),('485779'),('486161'),('486420'),('486863'),('487549'),('487702'),('488495'),('489075'),('489106'),('489319'),('489472'),('489930'),('49026'),('490342'),('490510'),('491486'),('492005'),('49209'),('49270'),('492814'),('492951'),('493195'),('493256'),('493516'),('49408'),('494080'),('494584'),('4946shpceraf8re5eqeamsmc55'),('494813'),('495240'),('496903'),('497300'),('497681'),('497788'),('498078'),('498414'),('49881'),('499070'),('499177'),('499573'),('499756'),('499970'),('4pa1ut6453big6us3e524hdn53'),('4q7llvvrescbofptvq46oglu05'),('50537'),('5218'),('52612'),('52856'),('52963'),('52rcr75k552joma7dmqq2oh222'),('54016'),('54107'),('54138'),('54336'),('54748'),('55221'),('55435'),('55740'),('55862'),('55954'),('57144'),('57495'),('57708'),('59143'),('59295'),('59524'),('59616'),('59921'),('59967'),('5acirhlrlnjumsdg2c8bcfn991'),('5dleilgtjoujc8qn6t4gmkkob0'),('60165'),('60333'),('60501'),('60867'),('61248'),('61279'),('62332'),('62759'),('62957'),('63125'),('63140'),('63202'),('63919'),('65765'),('66909'),('67184'),('69549'),('69824'),('69976'),('6gjtnvjef17hoifejd016abvv0'),('6ola0ug6etu7mgi8jf550g8vf6'),('6qcm5jlls010m9d463d4ii98c2'),('70007'),('70709'),('70800'),('708np8j8ja9et2lea6jb75ek30'),('70968'),('7141'),('71457'),('71518'),('71853'),('72479'),('72631'),('7278'),('72860'),('73074'),('73227'),('73455'),('74447'),('74783'),('74890'),('75042'),('75134'),('75378'),('75454'),('75668'),('7583'),('75927'),('76370'),('76416'),('76568'),('76675'),('7705'),('78186'),('78781'),('79193'),('79269'),('793'),('7980'),('79971'),('79986'),('7anjctk2917t7174fg3n4olae7'),('7dbo5ging7irc1sb45o7ff49h4'),('7rouphrssg7vqpddvad978f2s6'),('7s65l1nnmc8nior4bn45qjona7'),('7vknui6ot6sqoak1i0g9i9e5h7'),('80ph3e4q63jm3k8mgqe2lshmh0'),('81634'),('82000'),('82351'),('82748'),('83206'),('8529'),('85342'),('85495'),('85571'),('85876'),('86670'),('86776'),('87188'),('87372'),('87875'),('88180'),('8911'),('89111'),('89492'),('89721'),('8c2n6ls5evo1c58o19bjrq5t65'),('8c3qhu92c73euauclbqii56126'),('8ekc89jrmhgbb6s223ehsq5o94'),('8gk0goqg8oubju7nf9eaiclbq0'),('90973'),('91186'),('91980'),('92376'),('92407'),('92621'),('93002'),('93124'),('93795'),('9445'),('94604'),('95504'),('96573'),('9658'),('96d2e6152mp1ppj21ar71hmmm1'),('97183'),('976'),('97763'),('98282'),('983t7bfi0390j0phscrr7p0gs6'),('98526'),('99395'),('99945'),('9b35usigco17cq9al27qr63un3'),('a012fq34o6hhvtdo9fbgrtl0j2'),('aehnhf1rhq8e5jifofpvgkcqq1'),('af6biu36pr5lsqj7seug8l73s5'),('afc42oeeks7b6ucd99837h9av4'),('ajto4aupt87cfnns71pa4uanj4'),('aph4nif85skg29i0hd8gkfb8q1'),('atjqf7meaprlopvhe6dfmohom5'),('aui3lpjamaj2jup9iim3v17om2'),('b2a54kr4hc24ns96hv2u16kkk6'),('b2ub5oog4hpd7q7v91b290ui05'),('b4r9lgjc3ibg54tha3pr8ughk5'),('b68kpu4coo777rjmba6v61beq7'),('b96llvks9oe8d4go0s7kmco0f3'),('bb5asaps7gffiov33adotigio2'),('bvqog6jgp1ur6ocshirp5npok3'),('c4gnk4o5bfv1immafh61ucd41'),('c4gnk4o5bfvc1imfh61ucd41'),('c4gnk4o5bfvc1immafgjh61ucd41'),('c4gnk4o5bfvc1immafh61uc'),('c4gnk4o5bfvc1immafh61ucd4'),('c4gnk4o5bfvc1immafh61ucd41'),('c4gnk4o5bfvc1immafh61ugcd41'),('c4gnk4o5bfvc1immdafh61ucd41'),('c4gno5bfvc1immafh61ucd41'),('c8avr306mog9ip3ve5ga8h34t3'),('c8uihdj3bfspr6qi8j2feu3tq0'),('cd9c2qhf16ghss2puc5bq25p43'),('cj489rtkcdonsnesjvlmbnroq4'),('d2tbqo1c83t6osj185m8f6b582'),('dmgvgsfr5jm2gnfjhs6lmvaai7'),('do1bq25onm9stuvpadpqpafkv4'),('ds6m3d8i23c491anqoddibcsp1'),('egke5ijl501gtjadf0oid960v3'),('eqs7plm1rlllu7plqrqrh6gnl0'),('f0esbl88bos1b7edu5idp6hdc5'),('f4hbv9nc3f6j8vipnt9d040jr0'),('fam8h1g7abs2cmfk5c0lu2sbs0'),('fkhcect24ra53mpm2kph205ql3'),('fkpbl6f80g0ec26a8bifghqii5'),('fpmlat8qr66o3i3lv1t1ge8r94'),('fto55ag9rfuih6ee6khb6k6ge3'),('g78tl87272if6tvk3i1ovjo7h7'),('g7pcbvm774naeb7n83cp6ntt24'),('gigvfh8at3fh0n9m5f56fltm56'),('gmu2herqpq2kj9fe32n01glgd6'),('hhtod8j0nm5s0gom6bj6datk84'),('hmcdqo4v0n30c3dv4o5n71o634'),('hp7hgv0ea4qrvcqsvi4jt09ar5'),('ifhugm92kqte0ijah58pu6k6h6'),('iiib0a9soj3e91ngbe9vnqe253'),('ipi5q7nr792vne6d42h46fjgg6'),('jpd6ggrpdjlt68dldcd2tdagi6'),('js9ramrtgde7dk1mdjt51r3231'),('jsrj7tdliulbliqaqro182qd46'),('jueopjj02cg6bkfb2vs8t1o5p4'),('k4t10kvbpbs7h57n5iqgpm5ip5'),('kqi71up0dqv3lns4vl4t7b9t57'),('kr9ev5m3soiadnmfkqgglgpk44'),('ks1dqurnj1ovvnp6sip7frb5u6'),('ldmnbfu6anad5sfgfjsqi0g5e7'),('lfg9lf19nqfl34s305obptd854'),('lu2342eppn3r7a9v25mrhvieu3'),('m4u052v0sfhdkoc46tek8ik4i6'),('m6df8lji0otqnth103d2k5uml7'),('m7mf1190vc5vvhvgf0bqgq0ir6'),('mpff24c4ltfincgubetmc5ksq2'),('mtc4hqt4phlu9krhn3du94dap0'),('n5jjdied153dk71nh2san6mgf1'),('n7h245mst2hihl2ivdb0354vf4'),('nakua0mfpl98qplcdkq206nj82'),('nc1ad4ohujt2qvpnfin76tfjm4'),('nd5edmco5b3iihqhm8ccdlmeo5'),('ndvpnkkf6ek3k8vudd08aa7f92'),('nfi6dkaojl9hgos6e5qf3gadh3'),('nfk0celjekgs3ihn3e87vbk627'),('nm13m8844mbqt6oa3qg637ok41'),('o47e0dl0vsbbl9jk0qs2og1413'),('p80ssakd8uc7e3letuo9epcm03'),('pbnnq4ddhb6n687et63bk15ka6'),('pcst6qfp29fjl0r0iduvksp5d2'),('pequpq3fmd1bggktmroejd7tv7'),('pvm1cm5hrgngnaqpfgvrv28ig2'),('q9v6l7l4s61rnuqt6bo6l1nff7'),('qeatpni007andj8opr433fl1k7'),('qhmkqh26lo816jchpm0mm08sh6'),('qk7l8qbobh8a5pchff8iv35ek6'),('qmmkava587v2t5htp4h7vtt0e6'),('qo8q5adar7qa7p9n22h6cih5c4'),('r2fmifrl6eg5crqddknq2b6u80'),('r5hfe30je6uejel6ki5l6vtik1'),('rlg1qme0aorln0kdmd87f3i696'),('rpiq3qr2p3ad996q6rg5adac85'),('s0ecgsa94p5huhaefognfm12u4'),('sfdcrse3496gkgf7tmckdvuv96'),('sj3d0mnvoitvq9bijf2o9cdqq1'),('sjdhctj15cpobn25ng8o1lpgm4'),('t3mphn4r6uc7o8dfbbru3ebgu7'),('t4g1rgei81fc3s3n16c8amjm31'),('t5cg951sorif4b017racih1t13'),('ta8lnm7d1sql2qj4j9q1h2sku1'),('tmspn3glmvc5ej1g4dl334fc20'),('tp090p83af0igk78d9k23nff76'),('tqj5usem6l69qfetimglu5of96'),('trik4l4lspmahcd0qdhts3t434'),('u3974mtjuc7r8rc8rne5sekvr7'),('u42tg2h4ra8akns86arbta3082'),('ud4fkqt7h9cjaq94obh658n165'),('ugsqc1rpk2tblrn3ai5falp3d7'),('unt7fnqeb7mfl29ll44t0dfb40'),('v3fj5f1r7jlnvold9e6s7j8fm3'),('v9fjatl1a853dqjqte2q819jg0'),('vhv8i2s4ijnd6ihvpagmmqel92'),('vq8qfgfn9lppb24lnc0cl69f44'),('vsvh5m0ht3s888akij2ro9f2e0'),('vui452p1ae5j863bcmm94vobu2');

UNLOCK TABLES;

/*Table structure for table `projectexception` */

DROP TABLE IF EXISTS `projectexception`;

CREATE TABLE `projectexception` (
  `projid` int(11) default NULL,
  `q1reason` text,
  `q1datesub` datetime default NULL,
  `q1datesave` datetime default NULL,
  `q1savior` varchar(1000) default NULL,
  `q1submittor` varchar(1000) default NULL,
  `q2reason` text,
  `q2datesub` datetime default NULL,
  `q2datesave` datetime default NULL,
  `q2savior` varchar(1000) default NULL,
  `q2submittor` varchar(1000) default NULL,
  `q3reason` text,
  `q3datesub` datetime default NULL,
  `q3datesave` datetime default NULL,
  `q3savior` varchar(1000) default NULL,
  `q3submittor` varchar(1000) default NULL,
  `q4reason` text,
  `q4datesub` datetime default NULL,
  `q4datesave` datetime default NULL,
  `q4savior` varchar(1000) default NULL,
  `q4submittor` varchar(1000) default NULL,
  `q1recomendation` text,
  `q2recomendation` text,
  `q3recomendation` text,
  `q4recomendation` text,
  KEY `FK_projectexception` (`projid`),
  CONSTRAINT `FK_projectexception` FOREIGN KEY (`projid`) REFERENCES `tblprojects` (`projid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `projectexception` */

LOCK TABLES `projectexception` WRITE;

insert  into `projectexception`(`projid`,`q1reason`,`q1datesub`,`q1datesave`,`q1savior`,`q1submittor`,`q2reason`,`q2datesub`,`q2datesave`,`q2savior`,`q2submittor`,`q3reason`,`q3datesub`,`q3datesave`,`q3savior`,`q3submittor`,`q4reason`,`q4datesub`,`q4datesave`,`q4savior`,`q4submittor`,`q1recomendation`,`q2recomendation`,`q3recomendation`,`q4recomendation`) values (5077,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8646,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'dfgvfd','2016-03-31 17:43:00',NULL,NULL,'Donnie Rocapor Gallocanta, Programmer',NULL,NULL,NULL,'fdg'),(12230,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'dfgd','2016-04-01 14:34:00',NULL,NULL,'Donnie Rocapor Gallocanta, Programmer','gvxfg','2016-03-31 17:43:00',NULL,NULL,'Donnie Rocapor Gallocanta, Programmer',NULL,NULL,'gdfg','df'),(3192,NULL,NULL,NULL,NULL,NULL,'sdf','2016-04-01 14:16:00',NULL,NULL,'Donnie Rocapor Gallocanta, Programmer',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'sdfsdf',NULL,NULL),(25526,NULL,NULL,NULL,NULL,NULL,'fsdfs','2016-04-01 14:34:00',NULL,NULL,'Donnie Rocapor Gallocanta, Programmer',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'dfsdf',NULL,NULL),(6327,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

UNLOCK TABLES;

/*Table structure for table `tblagency` */

DROP TABLE IF EXISTS `tblagency`;

CREATE TABLE `tblagency` (
  `agencyid` int(11) NOT NULL auto_increment,
  `agencytype` int(11) default NULL,
  `agencycode` varchar(20) default NULL,
  `agencyhead` varchar(50) default NULL,
  `designation` varchar(50) default NULL,
  `agencyname` varchar(200) default NULL,
  PRIMARY KEY  (`agencyid`),
  KEY `agencytype` (`agencytype`),
  CONSTRAINT `tblagency_ibfk_1` FOREIGN KEY (`agencytype`) REFERENCES `tblagencytype` (`agencytypeid`)
) ENGINE=InnoDB AUTO_INCREMENT=32699 DEFAULT CHARSET=latin1;

/*Data for the table `tblagency` */

LOCK TABLES `tblagency` WRITE;

insert  into `tblagency`(`agencyid`,`agencytype`,`agencycode`,`agencyhead`,`designation`,`agencyname`) values (1,1,'DSWD','Director Marcelo Nicomedes J. Castillo','Regional Director',NULL),(2,1,'NEDA','Director Nestor G. Rillon','Regional Director','National Economic and Development Authority'),(242,1,'TESDA','Director Cenon M. Querubin ','Regional Director',NULL),(817,1,'DILG','Director Julie J. Daquioag','OIC-Regional Director',NULL),(875,1,'PCIC','Ms. Florentina O. Puga','OIC-Regional Director',NULL),(971,2,'LGU-Alaminos','Honorable Arthur F. Celeste ','Mayor',NULL),(1126,1,'OWWA','Mr. Sergio B. Borgueta, Jr. ','OIC-Regional Director',NULL),(3123,1,'LU-D2','Honorable Eufranio C. Eriguel','Congressman',NULL),(3681,1,'PHIC','Dr. Leo Douglas V. Cardona, Jr.','Regional Vice President',NULL),(4519,4,'PANG-D3','Honorable Rose Marie J. Arenas','Congresswoman',NULL),(5716,4,'PANG-D4','Honorable Ma. Georgina P. De Venecia','Congresswoman',NULL),(6469,2,'Dagupan','Honorable Belen T. Fernanandez','Mayor',NULL),(7044,1,'DOST','Dr. Armando Q. Ganal','Regional Director',NULL),(8034,1,'DOH','Dr. Myrna C. Cabotaje ','Regional Director',NULL),(8045,4,'IN-D2','Honorable Imelda R. Marcos','Congresswoman',NULL),(8156,1,'DPWH','Director Melanio C. Briosos','Regional Director',NULL),(8497,1,'DA','Director Valentino C. Perdido','OIC-Regional Executive Director',NULL),(8515,3,'PSU','President Dexter R. Buted ','University President',NULL),(8527,1,'NHA','Mr. Eduardo G. LeaÃ±o','Regional Manager',NULL),(8557,1,'PPA','Engr. Marieta G. Odicta ','Acting Port Manager',NULL),(9001,1,'DENR','Director Paquito T. Moreno, Jr. ','OIC-Regional Director',NULL),(9127,1,'PMS','Mr. Cesar V. Tuliao','Team Leader',NULL),(9862,2,'PG-IS','Honorable Ryan Luis V. Singson','Governor',NULL),(9902,1,'DepEd','Dr. Alma Ruby C. Torio ','OIC-Regional Director',NULL),(10152,2,'LGU-San Carlos','Honorable Julier C. Resuello ','Mayor',NULL),(11261,1,'R1MC','Dr. Joseph Roland O. Mejia','Medical Center Chief',NULL),(11343,1,'DOT','Director Martin S. Valera ','Regional Director',NULL),(11657,1,'HDMF','Ms. Rosalina S. Delos Reyes ','OIC-Branch Head',NULL),(11671,1,'DOLE','Dir. Grace Y. Ursua','Regional Director',NULL),(11695,4,'IS-D1','Honorable Ronald V. Singson','Congressman',NULL),(12712,1,'NIA','Engr. John N. Celeste ','Regional Irrigation Manager',NULL),(14522,4,'PANG-D6','Honorable Marlyn L. Primicias-Agabas','Congresswoman',NULL),(14808,1,'CHR','Atty. Romel P. Daguimol','OIC-Regional Director',NULL),(15684,1,'CAAP','Mr. Demetrio I. Apolinar','Airport Manager',NULL),(15959,1,'BFAR','Director Nestor D. Domenden','Regional Director',NULL),(15979,1,'NCIP','Director Felinor B. Sajonia','OIC-Director',NULL),(16072,2,'PG-LU','Honorable Manuel C. Ortega ','Governor',NULL),(16346,1,'DAR','Director Homer Tobias','Regional Director',NULL),(16406,1,'DBM','Director Nenita A. Failon','OIC-Regional Director',NULL),(16468,1,'PPMC','Honorable Florante S. Gerdan ','President/CEO',NULL),(17089,3,'NLPSC','Dr. Elizabeth Gacusana','President',NULL),(17344,3,'UNP','Dr. Gilbert R. Arce ','University President',NULL),(17893,4,'PANG-D1','Honorable Jesus F. Celeste','Congressman',NULL),(18162,1,'PIA','Director Jennilyne C. Role ','Regional Director',NULL),(18338,2,'LGU-San Fernando','Honorable Pablo C. Ortega ','Mayor',NULL),(18661,2,'LGU-Candon','Honorable Ericson G. Singson ','Mayor',NULL),(18941,2,'PG-IN','Honorable Imee R. Marcos ','Governor',NULL),(20398,4,'LU-D1','Honorable Victor Francisco C. Ortega','Congressman',NULL),(20521,2,'LGU-Vigan','Honorable Eva Marie S. Medina ','Mayor',NULL),(20878,4,'IN-D1','Honorable Rodolfo C. FariÃ±as','Congressman',NULL),(23393,2,'PG-PANG','Honorable Amado T. Espino, Jr. ','Governor',NULL),(23942,1,'PNP','PCSupt. Ericson T. Velasquez ','Regional Director',NULL),(24008,1,'NFA','Manager Carlito G. Co','Regional Manager II',NULL),(24471,4,'PANG-D5','Honorable Carmen S. Cojuangco','Congresswoman',NULL),(24720,1,'DTI','Director Florante O. Leal ','Regional Director',NULL),(25560,1,'ALBA','Ms. Hilaria J. Claveria','President',NULL),(25988,1,'PCA','Mr. Domingo Frugal','OIC- Regional Manager',NULL),(26867,3,'ISPSC','President Rafael B. Querubin ','University President',NULL),(27056,1,'ITRMC','Dr. Manuel F. Quirino,MD,PMPA,FPCOM,FPAMS','OIC',NULL),(27238,1,'NTA','Dr. Giovanni B. Palabay','Department Manager',NULL),(27463,1,'POPCOM','Director Erma R. Yapit ','OIC-Regional Director',NULL),(27632,1,'POEA','Ms. Delfina M. Camarillo','OIC',NULL),(28499,3,'DMMMSU','Dr. Benjamin P. Sapitula ','University President',NULL),(28892,1,'NNC','Ms. Ma. Eileen B. Blanco ','Nutrition Program Coordinator',NULL),(30140,2,'LGU-Batac','Honorable Jeffrey Jubal C. Nalupta ','Mayor',NULL),(30155,3,'MMSU','Dr. Prima Fe Franco','OIC-President',NULL),(30533,4,'IS-D2','Honorable Eric D. Singson','Congressman',NULL),(30874,2,'LGU-Urdaneta','Honorable Amadeo Gregorio E. Perez IV','Mayor',NULL),(31254,4,'PANG-D2','Honorable Leopoldo N. Bataoil','Congressman',NULL),(32301,1,'CHED','Director Teoticia C. Taguibao','OIC-Regional Director',NULL),(32410,1,'LBP-LU','Manager Joel K. Peredo ','Branch Head',NULL),(32698,2,'LGU-Laoag','Honorable Chevylle V. FariÃ±as ','Mayor',NULL);

UNLOCK TABLES;

/*Table structure for table `tblagencytype` */

DROP TABLE IF EXISTS `tblagencytype`;

CREATE TABLE `tblagencytype` (
  `agencytypeid` int(11) NOT NULL default '0',
  `agencytypecode` varchar(20) default NULL,
  `agencytypedesc` varchar(50) default NULL,
  PRIMARY KEY  (`agencytypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblagencytype` */

LOCK TABLES `tblagencytype` WRITE;

insert  into `tblagencytype`(`agencytypeid`,`agencytypecode`,`agencytypedesc`) values (1,'RLA','Regional Line Agencies'),(2,'LGU','Local Government Unit'),(3,'SUC','State Universities and Colleges'),(4,'CD','Congressional Districts'),(5,'RPMC','Regional Project Monitoring Committee');

UNLOCK TABLES;

/*Table structure for table `tblduedates` */

DROP TABLE IF EXISTS `tblduedates`;

CREATE TABLE `tblduedates` (
  `duedateId` int(11) NOT NULL,
  `duedate` date default NULL,
  `name` varchar(32) default NULL,
  PRIMARY KEY  (`duedateId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblduedates` */

LOCK TABLES `tblduedates` WRITE;

insert  into `tblduedates`(`duedateId`,`duedate`,`name`) values (123456,'2016-04-02','Monitoring Plan'),(428456,'2016-04-01','Q1 Accomplishment '),(545652,'2016-04-17','acc.quarter2'),(562856,'2016-04-26','acc.quarter3'),(851254,'2016-03-21','acc.quarter4'),(867423,'2016-03-23','proj.Exception Quarter 1'),(875858,'2016-02-12','proj.Exception Quarter 2'),(899079,'2016-03-23','proj.Exception Quarter 3'),(987898,'2016-02-12','proj.Exception Quarter 4');

UNLOCK TABLES;

/*Table structure for table `tblfundsrc` */

DROP TABLE IF EXISTS `tblfundsrc`;

CREATE TABLE `tblfundsrc` (
  `fundid` int(11) NOT NULL default '0',
  `fundtypeid` int(11) default NULL,
  `fundcode` varchar(20) default NULL,
  `funddesc` varchar(1000) default NULL,
  PRIMARY KEY  (`fundid`),
  KEY `fundtypeid` (`fundtypeid`),
  CONSTRAINT `tblfundsrc_ibfk_1` FOREIGN KEY (`fundtypeid`) REFERENCES `tblfundsrctype` (`fundtypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblfundsrc` */

LOCK TABLES `tblfundsrc` WRITE;

insert  into `tblfundsrc`(`fundid`,`fundtypeid`,`fundcode`,`funddesc`) values (1,1,'20% Dev\'t Fund','20% Development Fund'),(2,1,'GAD','GAD Budget - 5% of Agency Fund'),(3,NULL,'ACO GAA','Agency Central Office General Appropriation Act'),(4,1,'AHMP-PGN','Accelerated Hunger Mitigation Program-Practices on Good Nutrition'),(5,NULL,'ARO GAA','Agency Regional Office General Appropriation Act'),(6,NULL,'AusAUD','Australia Agency for International Development'),(7,NULL,'Calamity Fund','Calamity Fund'),(8,NULL,'ER 1-94','Energy Regulation No. 1-94'),(9,NULL,'IGP','Income Generating Projects'),(10,NULL,'IRA','Internal Revenue Allotment'),(11,NULL,'JICA','Japan International Cooperation Agency'),(12,NULL,'KOICA','Korea International Cooperation Agency'),(13,NULL,'RA 7171','RA 7171'),(14,NULL,'Special Education Fu','Special Education Fund'),(15,NULL,'Trust Fund','Trust Fund'),(16,1,'UNDP','United Nations Development Programme'),(14811,1,'SLRF','SPECIAL LOCAL ROAD FUND');

UNLOCK TABLES;

/*Table structure for table `tblfundsrctype` */

DROP TABLE IF EXISTS `tblfundsrctype`;

CREATE TABLE `tblfundsrctype` (
  `fundtypeid` int(11) NOT NULL default '0',
  `funddesc` varchar(100) default NULL,
  PRIMARY KEY  (`fundtypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblfundsrctype` */

LOCK TABLES `tblfundsrctype` WRITE;

insert  into `tblfundsrctype`(`fundtypeid`,`funddesc`) values (1,'Local Funds'),(2,'Foreign Assistance');

UNLOCK TABLES;

/*Table structure for table `tbllocation` */

DROP TABLE IF EXISTS `tbllocation`;

CREATE TABLE `tbllocation` (
  `locid` int(11) NOT NULL default '0',
  `provincename` varchar(50) default NULL,
  `district` varchar(50) default NULL,
  `city` varchar(50) default NULL,
  PRIMARY KEY  (`locid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbllocation` */

LOCK TABLES `tbllocation` WRITE;

insert  into `tbllocation`(`locid`,`provincename`,`district`,`city`) values (1,'Regionwide',NULL,NULL),(2,'Ilocos Norte',NULL,NULL),(3,'Ilocos Norte','District 1',NULL),(4,'Ilocos Norte','District 1','Laoag'),(5,'Ilocos Norte','District 2',NULL),(6,'Ilocos Norte','District 2','Batac'),(7,'Ilocos Sur',NULL,NULL),(8,'Ilocos Sur','District 1',NULL),(9,'Ilocos Sur','District 1','Vigan'),(10,'Ilocos Sur','District 2',NULL),(11,'Ilocos Sur','District 2','Candon'),(12,'La Union',NULL,NULL),(13,'La Union','District 1',NULL),(14,'La Union','District 1','San Fernando'),(15,'La Union','District 2',NULL),(17,'Pangasinan',NULL,NULL),(18,'Pangasinan','District 1',NULL),(19,'Pangasinan','District 1','Alaminos'),(20,'Pangasinan','District 2',NULL),(21,'Pangasinan','District 3',NULL),(22,'Pangasinan','District 3','San Carlos'),(23,'Pangasinan','District 4',NULL),(24,'Pangasinan','District 4','Dagupan'),(25,'Pangasinan','District 5',NULL),(26,'Pangasinan','District 5','Urdaneta'),(27,'Pangasinan','District 6','');

UNLOCK TABLES;

/*Table structure for table `tblperiod` */

DROP TABLE IF EXISTS `tblperiod`;

CREATE TABLE `tblperiod` (
  `periodId` int(11) NOT NULL,
  `periodname` varchar(32) default NULL,
  PRIMARY KEY  (`periodId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblperiod` */

LOCK TABLES `tblperiod` WRITE;

insert  into `tblperiod`(`periodId`,`periodname`) values (1,'carry over'),(2,'current year');

UNLOCK TABLES;

/*Table structure for table `tblprojaccomplishment` */

DROP TABLE IF EXISTS `tblprojaccomplishment`;

CREATE TABLE `tblprojaccomplishment` (
  `projid` int(11) NOT NULL,
  `agencyid` int(11) default NULL,
  `q1Paccomp` double default '0',
  `q1Faccomp` double default '0',
  `q1Maccomp` double default '0',
  `q1datesub` datetime default NULL,
  `q1datesave` datetime default NULL,
  `q1savior` varchar(100) default NULL,
  `q1submittor` varchar(100) default NULL,
  `q1CashDis` double default '0',
  `q1AccPayable` double default '0',
  `q1Remarks` varchar(500) default NULL,
  `q1Expenditure` double default '0',
  `q1Releases` double default '0',
  `q1Obligations` double default '0',
  `q2Paccomp` double default '0',
  `q2Faccomp` double default '0',
  `q2Maccomp` double default '0',
  `q2datesub` datetime default NULL,
  `q2datesave` datetime default NULL,
  `q2savior` varchar(100) default NULL,
  `q2submittor` varchar(100) default NULL,
  `q2CashDis` double default '0',
  `q2AccPayable` double default '0',
  `q2Remarks` varchar(500) default NULL,
  `q2Expenditure` double default '0',
  `q2Releases` double default '0',
  `q2Obligations` double default '0',
  `q3Paccomp` double default '0',
  `q3Faccomp` double default '0',
  `q3Maccomp` double default '0',
  `q3datesub` datetime default NULL,
  `q3datesave` datetime default NULL,
  `q3savior` varchar(100) default NULL,
  `q3submittor` varchar(100) default NULL,
  `q3CashDis` double default '0',
  `q3AccPayable` double default '0',
  `q3Remarks` varchar(500) default NULL,
  `q3Expenditure` double default '0',
  `q3Releases` double default '0',
  `q3Obligations` double default '0',
  `q4Paccomp` double default '0',
  `q4Faccomp` double default '0',
  `q4Maccomp` double default '0',
  `q4datesub` datetime default NULL,
  `q4datesave` datetime default NULL,
  `q4savior` varchar(100) default NULL,
  `q4submittor` varchar(100) default NULL,
  `q4CashDis` double default '0',
  `q4AccPayable` double default '0',
  `q4Remarks` varchar(500) default NULL,
  `q4Expenditure` double default '0',
  `q4Releases` double default '0',
  `q4Obligations` double default '0',
  PRIMARY KEY  (`projid`),
  KEY `projid` (`projid`),
  KEY `agencyid` (`agencyid`),
  CONSTRAINT `FK_tblprojaccomplishment` FOREIGN KEY (`projid`) REFERENCES `tblprojects` (`projid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tblprojaccomplishment_ibfk_2` FOREIGN KEY (`agencyid`) REFERENCES `tblagency` (`agencyid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblprojaccomplishment` */

LOCK TABLES `tblprojaccomplishment` WRITE;

insert  into `tblprojaccomplishment`(`projid`,`agencyid`,`q1Paccomp`,`q1Faccomp`,`q1Maccomp`,`q1datesub`,`q1datesave`,`q1savior`,`q1submittor`,`q1CashDis`,`q1AccPayable`,`q1Remarks`,`q1Expenditure`,`q1Releases`,`q1Obligations`,`q2Paccomp`,`q2Faccomp`,`q2Maccomp`,`q2datesub`,`q2datesave`,`q2savior`,`q2submittor`,`q2CashDis`,`q2AccPayable`,`q2Remarks`,`q2Expenditure`,`q2Releases`,`q2Obligations`,`q3Paccomp`,`q3Faccomp`,`q3Maccomp`,`q3datesub`,`q3datesave`,`q3savior`,`q3submittor`,`q3CashDis`,`q3AccPayable`,`q3Remarks`,`q3Expenditure`,`q3Releases`,`q3Obligations`,`q4Paccomp`,`q4Faccomp`,`q4Maccomp`,`q4datesub`,`q4datesave`,`q4savior`,`q4submittor`,`q4CashDis`,`q4AccPayable`,`q4Remarks`,`q4Expenditure`,`q4Releases`,`q4Obligations`) values (1164,1,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0),(3192,2,323,0,12,'2016-04-04 16:11:00',NULL,NULL,'Donnie Rocapor Gallocanta, Programmer',23,23,'null',46,12,233,4,0,322,'2016-04-01 14:16:00','2016-04-01 14:15:00','Donnie Rocapor Gallocanta, Programmer','Donnie Rocapor Gallocanta, Programmer',233,232,'null',NULL,223,2,4220,0,34,'2016-04-05 09:22:00','2016-04-01 14:22:00','Donnie Rocapor Gallocanta, Programmer','Donnie Rocapor Gallocanta, Programmer',3,123,'null',NULL,12,123,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0),(3921,1,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0),(4889,1,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0),(5077,1,21,0,1,'2016-03-31 17:22:00','2016-03-31 11:33:00','Donnie Rocapor Gallocanta, Programmer','Donnie Rocapor Gallocanta, Programmer',1,1,'sample',2,4,1,21,0,12,'2016-03-31 17:21:00','2016-03-31 11:34:00','Donnie Rocapor Gallocanta, Programmer','Donnie Rocapor Gallocanta, Programmer',123,3123,'null',NULL,123,12,21,0,21,'2016-03-31 17:41:00','2016-03-31 11:33:00','Donnie Rocapor Gallocanta, Programmer','Donnie Rocapor Gallocanta, Programmer',123,23,'null',NULL,123,123,21,0,123,'2016-03-31 17:23:00','2016-03-31 11:34:00','Donnie Rocapor Gallocanta, Programmer','Donnie Rocapor Gallocanta, Programmer',31,23,'null',NULL,123,21),(6327,971,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,43,0,34,'2016-04-04 16:47:00',NULL,NULL,'Donnie Rocapor Gallocanta, Programmer',34,34,'null',NULL,34,34,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0),(8646,1,54,0,323,'2016-03-31 17:22:00','2016-03-31 11:33:00','Donnie Rocapor Gallocanta, Programmer','Donnie Rocapor Gallocanta, Programmer',233,23,'null',256,123,2,14654,0,123,'2016-03-31 17:21:00','2016-03-31 11:34:00','Donnie Rocapor Gallocanta, Programmer','Donnie Rocapor Gallocanta, Programmer',12,3123,'null',NULL,3123,123,31321,0,31321,'2016-03-31 17:41:00','2016-03-31 11:33:00','Donnie Rocapor Gallocanta, Programmer','Donnie Rocapor Gallocanta, Programmer',3,2,'null',NULL,23,23,12,0,12,'2016-03-31 17:23:00','2016-03-31 11:34:00','Donnie Rocapor Gallocanta, Programmer','Donnie Rocapor Gallocanta, Programmer',23,23,'null',NULL,123,23),(8800,1,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0),(11242,1,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0),(11995,1,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0),(12230,1,5454,0,4,'2016-03-31 17:22:00',NULL,NULL,'Donnie Rocapor Gallocanta, Programmer',23,23,'null',46,323,23,545,0,32,'2016-03-31 17:21:00',NULL,NULL,'Donnie Rocapor Gallocanta, Programmer',1,23,'null',NULL,12,3123,1,0,45,'2016-03-31 17:41:00',NULL,NULL,'Donnie Rocapor Gallocanta, Programmer',23,23,'null',NULL,123,2,1,0,54,'2016-03-31 17:23:00',NULL,NULL,'Donnie Rocapor Gallocanta, Programmer',23,3,'null',NULL,23,32),(18389,1,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0),(25526,875,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,100,0,324,'2016-04-01 14:27:00',NULL,NULL,'Donnie Rocapor Gallocanta, Programmer',23,2,'null',NULL,123,23,23,0,2,'2016-04-04 16:09:00','2016-04-04 15:02:00','Donnie Rocapor Gallocanta, Programmer','Donnie Rocapor Gallocanta, Programmer',3,123,'null',NULL,12,123.02,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0),(28638,1,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0),(30143,1,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,0,0,0);

UNLOCK TABLES;

/*Table structure for table `tblprojects` */

DROP TABLE IF EXISTS `tblprojects`;

CREATE TABLE `tblprojects` (
  `projid` int(20) NOT NULL,
  `agencyid` int(100) default '0',
  `fundid` int(100) default '0',
  `locid` int(100) default '0',
  `secid` int(100) default '0',
  `subsecid` int(100) default '0',
  `projname` varchar(1000) default NULL,
  `unitofmeasure` varchar(1000) default NULL,
  `yrenrolled` int(100) default NULL,
  `enrolledby` int(100) default NULL,
  `period` int(100) default NULL,
  `programname` varchar(1000) default NULL,
  `datatype` varchar(64) default 'Default',
  `typhoon` int(100) default NULL,
  `datestart` varchar(100) default NULL,
  `dateend` varchar(100) default NULL,
  `projObjective` text,
  `expectedresult` int(100) default NULL,
  `actualresult` int(100) default NULL,
  `iscompleted` varchar(24) default NULL,
  `ordering` double default NULL,
  PRIMARY KEY  (`projid`),
  KEY `agencyid` (`agencyid`),
  KEY `fundid` (`fundid`),
  KEY `locid` (`locid`),
  KEY `secid` (`secid`),
  KEY `subsecid` (`subsecid`),
  KEY `enrolledby` (`enrolledby`),
  KEY `FK_tblprojects3` (`period`),
  KEY `FK_tblprojectsTyphoon` (`typhoon`),
  CONSTRAINT `FK_tblprojects` FOREIGN KEY (`enrolledby`) REFERENCES `tbluser` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_tblprojects3` FOREIGN KEY (`period`) REFERENCES `tblperiod` (`periodId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_tblprojectsTyphoon` FOREIGN KEY (`typhoon`) REFERENCES `typhoon` (`typhoonid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tblprojects_ibfk_1` FOREIGN KEY (`agencyid`) REFERENCES `tblagency` (`agencyid`),
  CONSTRAINT `tblprojects_ibfk_3` FOREIGN KEY (`fundid`) REFERENCES `tblfundsrc` (`fundid`),
  CONSTRAINT `tblprojects_ibfk_4` FOREIGN KEY (`locid`) REFERENCES `tbllocation` (`locid`),
  CONSTRAINT `tblprojects_ibfk_5` FOREIGN KEY (`secid`) REFERENCES `tblprojsector` (`secid`),
  CONSTRAINT `tblprojects_ibfk_6` FOREIGN KEY (`subsecid`) REFERENCES `tblprojsubsector` (`subsecid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblprojects` */

LOCK TABLES `tblprojects` WRITE;

insert  into `tblprojects`(`projid`,`agencyid`,`fundid`,`locid`,`secid`,`subsecid`,`projname`,`unitofmeasure`,`yrenrolled`,`enrolledby`,`period`,`programname`,`datatype`,`typhoon`,`datestart`,`dateend`,`projObjective`,`expectedresult`,`actualresult`,`iscompleted`,`ordering`) values (1164,1,1,1,7904,9725,'uhgjhg','jhkhjkh',2016,131,2,'no program','Default',0,'2016-08','','hjkgkjhk',87,NULL,NULL,1),(3192,2,1,1,7904,9725,'sdfsdf','sdfsdf',2016,361716966,2,'no program','Default',0,'','','sdfs',23,NULL,'completed',2),(3921,1,1,1,19613,10586,'adasda','fsdf',2016,361716966,2,'no program','Cumulative',0,'','','sdfsdf',23,NULL,NULL,3),(4889,1,2,1,9490,24385,'sdfsfsadfs','sdfsdf',2016,131,2,'no program','Maintained',0,'2016-12','2016-12','fgsdf',121,NULL,NULL,4),(5077,1,1,1,9490,24385,'sample project','sample unit of measure',2016,361716966,2,'no program','Maintained',0,'2016-01','2016-12','sample objective',1,NULL,'not-completed',5),(6327,971,1,1,9490,0,'sfsdfsdf','asd',2016,361716966,2,'no program','default',0,'','','asd',12,NULL,'not-completed',6),(8646,1,1,1,7904,13504,'asfdasdfsd','fsdfsdf',2016,361716966,2,'no program','Cumulative',0,'','','dsfdsf',12,NULL,'not-completed',7),(8800,1,1,2,20239,4082,'sdsadfsdf','dsfgsf',2016,131,1,'fsdfsdf','Default',0,'2016-12','2016-12','ddvsdsvsgvsvs',23,NULL,NULL,8),(11242,1,1,1,19613,5381,'kdjfgshkjg','sdfs',2016,131,2,'no program','Cumulative',0,'','','',0,NULL,NULL,9),(11995,1,1,1,7904,9725,'kskjhdfljdfjslkfdjksdfjsdpgjdghklfjsdklgjkjlk gfdg df gd fg df gdf g d fg dfgdf g df gw s fds f sdf s df sd f sd fs df sd f sdf s df sd f sd f sd f sdf sd f s df sdf sd f sd f sd fsd f sd f sdf sd f sd fs df sd f ','sdfsdfsdf',2016,131,2,'no program','Maintained',0,'','','',0,NULL,NULL,10),(12230,1,1,4,19613,11825,'sdfsdfsdf','wsfdf',2016,361716966,2,'no program','Default',0,'','','sdfsdf',3,NULL,'not-completed',11),(18389,1,1,1,7904,9725,'isdjgfhedf','sffsdf',2016,131,2,'no program','Default',0,'','','dsfgdsg',23,NULL,NULL,12),(25526,875,1,1,9490,26152,'asdasd','dasdasd',2016,361716966,2,'no program','Maintained',0,'','','adsdas',123,NULL,'not-completed',13),(28638,1,1,1,7904,9725,'KSDHFGKLDSJ','ldskf',2016,131,2,'no program','Default',0,'2016-11','','sdfaf',21,NULL,NULL,14),(30143,1,1,1,32628,10421,'hghjkj','jhjghjio',2016,131,2,'no program','Default',0,'','','',0,NULL,NULL,15);

UNLOCK TABLES;

/*Table structure for table `tblprojsector` */

DROP TABLE IF EXISTS `tblprojsector`;

CREATE TABLE `tblprojsector` (
  `secid` int(11) NOT NULL auto_increment,
  `secname` varchar(50) default NULL,
  PRIMARY KEY  (`secid`)
) ENGINE=InnoDB AUTO_INCREMENT=32629 DEFAULT CHARSET=latin1;

/*Data for the table `tblprojsector` */

LOCK TABLES `tblprojsector` WRITE;

insert  into `tblprojsector`(`secid`,`secname`) values (0,'Select Sector'),(7904,'Environment'),(9490,'Governance'),(19613,'Infrastructure and Utilities'),(20239,'Social Development '),(29923,'Trade Industry and Tourism'),(32628,'Agribusiness');

UNLOCK TABLES;

/*Table structure for table `tblprojsubsector` */

DROP TABLE IF EXISTS `tblprojsubsector`;

CREATE TABLE `tblprojsubsector` (
  `subsecid` int(11) NOT NULL,
  `secid` int(11) default NULL,
  `subsecname` varchar(100) default NULL,
  PRIMARY KEY  (`subsecid`),
  KEY `secid` (`secid`),
  CONSTRAINT `tblprojsubsector_ibfk_1` FOREIGN KEY (`secid`) REFERENCES `tblprojsector` (`secid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblprojsubsector` */

LOCK TABLES `tblprojsubsector` WRITE;

insert  into `tblprojsubsector`(`subsecid`,`secid`,`subsecname`) values (0,NULL,'No Subsector'),(1963,20239,'Education and Manpower Development'),(2172,19613,'Communications'),(3495,19613,'Others'),(4082,20239,'Social Services and Community Development'),(5381,19613,'Power Energy and Electrification'),(5885,20239,'Housing'),(9725,7904,'Brown Environment'),(10421,32628,'Livestock'),(10586,19613,'Irrigation'),(10939,32628,'Science and Technology'),(11082,32628,'Support Services'),(11825,19613,'Water Supply, Harvesting, Sewerage  & Sanitation'),(13504,7904,'Blue Environment'),(13891,7904,'Green Environment'),(14219,19613,'Flood Control'),(14654,32628,'Agrarian Reform'),(21359,19613,'Airport and Air Navigation'),(23496,NULL,'Health, Nutrition and Population'),(23788,32628,'Fisheries'),(24385,9490,'Development Finance'),(25172,20239,'Health, Population and Nutrition'),(26152,9490,'Development Administration'),(27607,NULL,'Airports And Air Navigation'),(27977,19613,'Roads and Bridges'),(29599,32628,'Crops'),(30286,19613,'Ports'),(30548,19613,'Social Infra'),(31002,NULL,'Water Supply, Harvesting, Sewerage & Sanitation');

UNLOCK TABLES;

/*Table structure for table `tblprojtargets` */

DROP TABLE IF EXISTS `tblprojtargets`;

CREATE TABLE `tblprojtargets` (
  `projid` int(11) default NULL,
  `agencyid` int(11) default NULL,
  `q1Ptarget` double NOT NULL,
  `q1Ftarget` double NOT NULL,
  `q1Mtarget` double NOT NULL,
  `q2Ptarget` double NOT NULL,
  `q2Ftarget` double NOT NULL,
  `q2Mtarget` double NOT NULL,
  `q3Ptarget` double NOT NULL,
  `q3Ftarget` double NOT NULL,
  `q3Mtarget` double NOT NULL,
  `q4Ptarget` double NOT NULL,
  `q4Ftarget` double NOT NULL,
  `q4Mtarget` double NOT NULL,
  `datesub` datetime NOT NULL default '0000-00-00 00:00:00',
  `isApproved` tinyint(1) NOT NULL default '0',
  `submittor` varchar(64) default NULL,
  KEY `projid` (`projid`),
  KEY `agencyid` (`agencyid`),
  CONSTRAINT `tblprojtargets_ibfk_1` FOREIGN KEY (`projid`) REFERENCES `tblprojects` (`projid`),
  CONSTRAINT `tblprojtargets_ibfk_2` FOREIGN KEY (`agencyid`) REFERENCES `tblagency` (`agencyid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `tblprojtargets` */

LOCK TABLES `tblprojtargets` WRITE;

insert  into `tblprojtargets`(`projid`,`agencyid`,`q1Ptarget`,`q1Ftarget`,`q1Mtarget`,`q2Ptarget`,`q2Ftarget`,`q2Mtarget`,`q3Ptarget`,`q3Ftarget`,`q3Mtarget`,`q4Ptarget`,`q4Ftarget`,`q4Mtarget`,`datesub`,`isApproved`,`submittor`) values (5077,1,21,21,21,21,21,21,21,21,21,21,21,21,'2016-03-30 09:49:00',0,'Donnie Rocapor Gallocanta, Programmer'),(8646,1,54,1313,33.1,14654,1313,313,31321,21321,1321,31,31,321,'2016-03-30 14:11:00',0,'Donnie Rocapor Gallocanta, Programmer'),(12230,1,5454,54,45,545,545,454,45,454,54,45,545,54,'2016-03-31 14:32:00',0,'Donnie Rocapor Gallocanta, Programmer'),(3192,2,23423,42,3423,423,3423,423,4234,423,4324,23423,42,1243,'2016-04-01 09:09:00',1,'Donnie Rocapor Gallocanta, Programmer'),(3921,1,12432,234,434,342,234,34,3423,234,343,4234,234,4,'2016-04-01 09:11:00',0,'Donnie Rocapor Gallocanta, Programmer'),(25526,875,234,234,234,234,234,34,23,234,34,423,4234,34,'2016-04-01 09:11:00',0,'Donnie Rocapor Gallocanta, Programmer'),(6327,971,21.001,212,12,2,12,121,21,12,21,21,12,21,'2016-04-01 09:22:00',0,'Donnie Rocapor Gallocanta, Programmer'),(8800,1,2,125,21,21212,12,212,21,121,121,212,21,2,'2016-04-01 11:28:00',0,'Donnie Rocapor Gallocanta, Programmer'),(4889,1,1212,4321,16,1212,8657,3,121,16,4532,326,42,32,'2016-04-01 11:29:00',0,'Donnie Rocapor Gallocanta, Programmer'),(28638,1,1,12,22,1,2,2,212,2,2,12,2,23,'2016-04-01 11:29:00',0,'Donnie Rocapor Gallocanta, Programmer'),(30143,1,31,12,2,23,12,1212,1,121,12,212,21,121,'2016-04-01 11:30:00',0,'Donnie Rocapor Gallocanta, Programmer'),(1164,1,212,121,121,121,21,21,21,212,212,212,12,1,'2016-04-01 11:31:00',0,'Donnie Rocapor Gallocanta, Programmer'),(18389,1,233254,15,412,2584,421,45,24,54,4241,542,215,54,'2016-04-01 11:32:00',0,'Donnie Rocapor Gallocanta, Programmer'),(11242,1,21241,121,21,212,212,201,12,121,2121,1212,2121,1,'2016-04-01 11:33:00',0,'Donnie Rocapor Gallocanta, Programmer'),(11995,1,545,54,54,454,545,545,545,45,454,454,454,54,'2016-04-01 11:34:00',0,'Donnie Rocapor Gallocanta, Programmer');

UNLOCK TABLES;

/*Table structure for table `tbluser` */

DROP TABLE IF EXISTS `tbluser`;

CREATE TABLE `tbluser` (
  `userid` int(64) NOT NULL,
  `agencyid` int(64) default NULL,
  `uname` varchar(20) NOT NULL,
  `pword` varchar(64) default NULL,
  `rightid` int(11) default NULL,
  `email` varchar(64) default NULL,
  `position` varchar(64) default NULL,
  `lastname` varchar(64) default NULL,
  `firstname` varchar(64) default NULL,
  `middlename` varchar(64) default NULL,
  `division` varchar(64) default NULL,
  `title` varchar(64) default NULL,
  PRIMARY KEY  (`userid`,`uname`),
  UNIQUE KEY `tbluser` (`userid`,`uname`),
  KEY `agencyid` (`agencyid`),
  KEY `rightid` (`rightid`),
  CONSTRAINT `tbluser_ibfk_1` FOREIGN KEY (`agencyid`) REFERENCES `tblagency` (`agencyid`),
  CONSTRAINT `tbluser_ibfk_2` FOREIGN KEY (`rightid`) REFERENCES `tbluserrights` (`rightid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbluser` */

LOCK TABLES `tbluser` WRITE;

insert  into `tbluser`(`userid`,`agencyid`,`uname`,`pword`,`rightid`,`email`,`position`,`lastname`,`firstname`,`middlename`,`division`,`title`) values (101,8497,'jennifer01','e2ad27448450222fff6e996d4a942b931ae14abc',2,'jennifer_pulmano@yahoo.com','PEO II','','','','',''),(102,11657,'monique1','146f1f7c05ec7bd056344e9468039e5a7a574b15',2,'nicprep@ymail.com','CMT II','Prepose','Monique','','',''),(103,27238,'manuel01','34b70591e298c58424d7971304c4a4655b8a5138',2,'bamiscalmanuel@yahoo.com','Economist IV','','','','',''),(104,16072,'ronald01','6fb0f2e41596affae3fdb3dea0765da4add8bd8c',2,'lu_ppdo@yahoo.com','PEO-I','Cabrullos','Ronald','','',''),(105,9902,'corazon01','f3612cd52627a05f07dc297c183032947e10e794',2,'luquingan_cor@yahoo.com','EPS','','','','',''),(106,2,'don11','f13c5f8d0c79f6d91429ebbd5c361ad239860a55',1,'dgallocanta@gmail.com','Job Order','gallocanta','donnie','rocapor','PMED',''),(107,9001,'armand01','88a0eaa6abeb6dbca65a3eb798f023e1b9961625',2,'armhe2004@yahoo.com','AA 1','','','','',''),(108,23942,'judith01','72744f36da59a8446a13a9f502b9f545b3839058',2,'judithlamparan@yahoo.com','Planning Officer 01','','','','',''),(109,8034,'elvira1','8e5ee5bfa43eede2eac47bde6cb95463a161b04d',2,'elvirapoplonot@yahoo.com','Statistician II','Paplonot','Elvira ','D.','',''),(110,8034,'jay1','3e4b1420d0f468b77ba9d61ba56b3dc3680f8ee3',2,'dulayjay@gmail.com','SHPO','Dulay','Jay','V.','',''),(111,9001,'edwin1','851b360930f4e54f89146e317dfe41cb67391130',2,'edwindilim@gmail.com','PEO 1','Dilim','Edwin','M.','',''),(112,7044,'sheryl01','aa57ca11c582cd8fe51858b3524ff8ddee1e333d',2,'shyre.eslao@gmail.com','PA III','','','','',''),(113,8156,'alvin1','57698cfe67b7f3b0562d7828694308bfd139f14d',2,'alvin.eguilos@gmail.com','ENGR. I','Eguilos','Alvin Joseph ','D.','',''),(114,15684,'bimbo01','2ee4be340a94b56a192b0620c4cf8047846cad27',2,'arzadonbimbo@yahoo.com.ph','Engr. II','','','','',''),(115,30155,'aris1','3589822a0cbfa134ad01ac64feb13dd8a90ef8a4',2,'arvcajigal@yahoo.com','Extension Director','Cajigal','Aris Reynold','V.','',''),(116,7044,'mel01','a5260f1c081f8306a0b3031f93014b50520e8b04',2,'smilegurtiza24@yahoo.com','SRS','Gurtiza','Mel','','',''),(117,27463,'gerson01','7771360f076742a9af8245ba704a243e44288ae9',2,'popcomro1.imcu@gmail.com','PEO 1','','','','',''),(118,11671,'allen01','56e6a404f8200f42486926ff8b7d3beed7de7056',2,'tssd.dole1@yahoo.com','PO III','','','','',''),(119,9862,'mancielito01','8bbb9fcde3cb451286c7d98df60efb2be220d68b',2,'ppdo_isur@yahoo.com','Admin Assistant II','','','','',''),(120,32301,'angelica01','df8385a3d661dbeb3348fd0b4ca14d3b709f2d0b',2,'angel@yahoo.com','ES II','','','','',''),(121,2,'freynon','1dd6a1292b8adea82433fd48679a58f4370bf540',1,'freynon@gmail.com','Sr. EDS','Perez','Ednore Freynon','Nuval','PMED',''),(122,28499,'remelyn01','c78b7439f6267a557be6533a9778ea79534651bc',2,'dmmmsucarris@yahoo.com','','','','','',''),(123,16072,'rainier01','cc74af6e97c7cdd814f8fdb83313333acaf642c3',2,'lu_ppdo@yahoo.com','PEO II','De Guzman','Rainier','','',''),(124,8156,'ethel1','9a6d863ff419aa459257dd41f7e12af5c6006847',2,'esquejo.ethel_jane@dpwh.gov.ph','ENGR. II','Esquejo','Ethel Jane','C.','',''),(125,1,'staff01','665fb0670b0cdc4743bdf0c849419c977b90e46d',2,'dgallocanta@gmail.com','unknown','unknown','unknown','unknown','unknown','unknown'),(126,32301,'catherine01','6d5c5a1a3c2fd063c8728ffa8327d7ae7fdf1468',2,'cchan@ched.gov.ph','ES II','CHan','Catherin','','`',''),(127,242,'crescencia1','7d28964ee79046241c4c34e33485836251d5fc53',2,'cbboac@tesda.gov.ph','Supervising TESDS','Boac','Crescencia','B.','',''),(128,2,'chester01','07555cf4474a9a1189b4f804879283efc6a3cc0a',1,'chester.erestingcol@yahoo.com','EDS','Erestingcol','Chester','Evangelista','PMED',''),(129,12712,'katherine01','853f83af25e7596f0ebab4c1ab2767a04cd6e523',2,'katine_65@yahoo.com','Sr. Engineer A.','','','','',''),(130,11343,'loryna01','9e83ac46ad306581ffa9e3c09c1ac9a7b8ed1677',2,'dotregion1@pldtdsl.net','STOO','Fonacier','Loryna','','',''),(131,1,'david01','97d5587e2795825682defdcc183d41a6fbd39b05',2,'planning.fo1@dswd.gov.ph','statistician 1','Rabelas','David','','',''),(132,17089,'rodolfo01','6934f5be54a4b46c3d56c65ecd5375e46de3d243',2,'rcmoreno3@yahoo.com','Planning','','','','',''),(133,15959,'jeizel01','6938448804c07bcd9329bbb88d032e2ba812403c',2,'jzl_420@yahoo.com','Aqua I','','','','',''),(134,28499,'zaldy01','3ce99572e51c7b27ee9a69106f6b483478f51b47',2,'zrdelmendo@dmmmsu.edu.ph','Planning Staff','','','','',''),(135,8156,'angelito1','b8a7635b28f6b6ff6513f5858c296b0b3d6d9df5',2,'dianangelito@yahoo.com','ENGR. III','Dian','Angelito','A.','','ENGR.'),(136,15979,'helen01','f6851ee67a43048ccbc5474dcfd6dd1bb056cdcf',2,'lhentistino@yahoo.com','TAA 1','','','','',''),(137,27056,'cherrie1','824204a7be8ee9b1aad94b688e6cf1829b62683e',2,'cherriemaymd@yahoo.com.ph','MS-IV','','Cherrie May','','',''),(138,2,'ryanne','3eb455b673c01e2da6dee6e1123022f928748d38',1,'ryanne.narvaez@gmail.com','SrEDS','Narvaez','Ryanne','Nieveras','PMED',''),(139,11671,'allen01','56e6a404f8200f42486926ff8b7d3beed7de7056',2,'tssd.dole1@yahoo.com','PO III','Navarro','Allen','','',''),(140,23393,'brigida01','aa0733457379bb55f8eb9d6665bceda8d02a11c7',2,'bergiecaoile@yahoo.com','','','','','',''),(141,9902,'celso01','960414b31786cf545a117769d8370aaf07158d76',2,'ceaman777@yahoo.com','Engineer III','','','','',''),(142,25988,'chricept1','21915da11777ef2feb5732c1d2e62768957e95e6',2,'chrisviloria@rocketmail.com','PDO IV','Viloria','Chricept','T.','',''),(143,8497,'glenda01','8728b8b273d232b857a9a2789296beca9e02e934',2,'glenvillagao@yahoo.com','CMT II','','','','',''),(144,17344,'mariano01','ffe1623e85b2b7d35bead8f0ffa0db306bb0dfd8',2,'mariromano@unp.edu.ph','Admin Art II','Romano, jr.','Mariano','','',''),(145,8515,'merlita01','2ee1f014f3ff060a3d410ab0f25d15f24ea2f330',2,'merlita@yahoo.com','GAD Director','','','','',''),(146,8515,'odessa01','7b798abc47111e3f51d089039a1c0f909ad4ad79',2,'dess_psu@yahoo.comDireco','Planning Director','','','','',''),(147,26867,'reagan1','3c907475620184a5839e9f699d974d14afe00e7f',2,'reaganlouie-funtanilla@yahoo.com','Admin Officer 1','Funtanilla','Reagan Louie','C.','',''),(149,15979,'rosemary01','9c673cc8a988471eff7112285af6621e77ff333e',2,'rmabenes@yahoo.com','PEO 2','','','','',''),(16058,2,'Bernardo7','9a7c6f11fa15c224006bf9147c1da5a5ad027500',1,'bernardbiay@yahoo.com','Sr EDS','Biay','Bernardo','Ferrer','PMED','Mr.'),(18366,2,'dodo','3edd00c7c6b6f37644992009a7337736c77ff427',2,'donnie@gmail.com','wala','wala','wala','wala','wala','wala'),(24185,1,'donnie','8a7da7992472230059f3a2ba5c0fe4c1547cba4b',2,'dgallocanta@gmail.com','JO','gallocanta','donnie','rocapor','PMED',''),(361716966,2,'donnie09','10a1338886d2258dc21ec0b23e3e498c428ca70e',1,'dgallocanta@gmail.com','Programmer','Gallocanta','Donnie','Rocapor','PMED',NULL);

UNLOCK TABLES;

/*Table structure for table `tbluserrights` */

DROP TABLE IF EXISTS `tbluserrights`;

CREATE TABLE `tbluserrights` (
  `rightid` int(11) NOT NULL default '0',
  `rightdesc` varchar(20) default NULL,
  PRIMARY KEY  (`rightid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbluserrights` */

LOCK TABLES `tbluserrights` WRITE;

insert  into `tbluserrights`(`rightid`,`rightdesc`) values (1,'Admin'),(2,'Program User');

UNLOCK TABLES;

/*Table structure for table `typhoon` */

DROP TABLE IF EXISTS `typhoon`;

CREATE TABLE `typhoon` (
  `typhoonid` int(11) NOT NULL,
  `typhoonName` varchar(64) default NULL,
  `year` year(4) default NULL,
  PRIMARY KEY  (`typhoonid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `typhoon` */

LOCK TABLES `typhoon` WRITE;

insert  into `typhoon`(`typhoonid`,`typhoonName`,`year`) values (0,'no typhoon',NULL),(4341,'lando',2011),(12779,'undoy',2016);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
