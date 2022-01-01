/* user and group to drop privileges to */
static const char *user  = "dt";
static const char *group = "dt";

static const char *colorname[NUMCOLS] = {
	[INIT] =   "#2E3440",     /* after initialization */
	[INPUT] =  "#4C566A",   /* during input */
	[FAILED] = "#BF616A",   /* wrong password */
};

/* treat a cleared input like a wrong password (color) */
static const int failonclear = 1;
