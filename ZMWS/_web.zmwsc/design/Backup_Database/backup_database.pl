#!/bin/env perl

use Getopt::Long;
use File::Basename;

my $version = "1.0.0 ©Zyra Jeremy";
my $db_name;
my $destination_directory;
my $help = 0;
my $mysqldump;

sub AfficherAide
{

	my $script = __FILE__;
	$script = basename($script);
	my @TexteAide;
	push(@TexteAide, "****  $version  ****\n\n");
	push(@TexteAide, "Usage :\n");
	push(@TexteAide, "	" . $script . " -db_name=<database name> -destination_directory=<path name> -mysqldump_path=<path mysqldump>\n");
	push(@TexteAide, "	The command make a backup of a database.\n\n");
	push(@TexteAide, "Options : \n");
	push(@TexteAide, "	-db_name		: The name of database.\n");
	push(@TexteAide, "	-mysqldump_path		: The path to the binary of mysqldump.\n");
	push(@TexteAide, "	-destination_directory	: The directory to copy the backup.\n");
	push(@TexteAide, "	-h			: Display this help\n");

	print STDOUT @TexteAide;

}

GetOptions("db_name=s" => \$db_name, "destination_directory=s" => \$destination_directory ,"help" => \$help, "h" => \$help, "mysqldump_path=s", \$mysqldump);

if ($help == 0 && defined($db_name) && defined($destination_directory) && defined($mysqldump))
{

	my $date = `date "+%m-%d-%Y_%k-%M-%S_%N" | tr -d '\n' | tr -d ' '`;
	system "$mysqldump --user=root --password=mysql --databases $db_name > $destination_directory/Backup_" . $db_name  . "_" . $date . ".sql";

}

else
{

	AfficherAide()

}
