{* smarty *} 
{config_load file="configs/site.conf"}
{load_presentation_object filename="store_front" assign="obj"}

<!DOCTYPE html>
<html>
	<head>
		<title>{#site_title#}</title>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8"/>
		<link type="text/css" rel="stylesheet" href="{$obj->mSiteUrl}styles/tshirtshop.css}"/>		
	</head>
	<body>
		<div id="doc">
			<div id="bd">
				<div>
					<div id="header">
						<a href="{$obj->mSiteUrl}">
							<img src="{$obj->mSiteUrl}images/tshirtshop.png" alt="tshirtshop logo"/>
						</a>
					</div>
					<div id="contents">
						{include file=$obj->mContentsCell}
					</div>
				</div>
			</div>
			<div>
				{include file="departments_list.tpl"}
				{include file=$obj->mCategoriesCell}
			</div>
		</div>
	</body>
</html>