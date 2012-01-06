-- --------------------------------------------------------

--
-- Structure de la table `liens`
--

CREATE TABLE IF NOT EXISTS `liens` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `IP` text NOT NULL,
  `lien` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `IP` text NOT NULL,
  `date` datetime NOT NULL,
  `nombre_liens` int(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;
