#!/bin/env perl

use Getopt::Long;
use File::Basename;

my $version = "1.0.0 ©Zyra Jeremy";
my $db_name;
my $backup_sql;
my $help = 0;
my $mysql;

sub AfficherAide
{

	my $script = __FILE__;
	$script = basename($script);
	my @TexteAide;
	push(@TexteAide, "****  $version  ****\n\n");
	push(@TexteAide, "Usage :\n");
	push(@TexteAide, "	" . $script . " -db_name=<database name> -backup_sql=<path sql file> -mysql_path=<path_mysql>\n");
	push(@TexteAide, "	The command restore a database.\n\n");
	push(@TexteAide, "Options : \n");
	push(@TexteAide, "	-db_name		: The name of database.\n");
	push(@TexteAide, "	-mysql_path		: The path to the binary of mysql.\n");
	push(@TexteAide, "	-backup_sql		: The path of backup.\n");
	push(@TexteAide, "	-h			: Display this help.\n");

	print STDOUT @TexteAide;

}

GetOptions("db_name=s" => \$db_name, "backup_sql=s" => \$backup_sql ,"help" => \$help, "h" => \$help, "mysql_path=s", \$mysql);

if ($help == 0 && defined($db_name) && defined($backup_sql) && defined($mysql))
{

	system "$mysql --user=root --password=mysql $db_name < $backup_sql";

}

else
{

	AfficherAide()

}
