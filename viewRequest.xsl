<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
		
	<xsl:template match="data">

		<xsl:for-each select="lists/list">
			<div class="list">
				<div class="ldate">
					<div class="dyear">
						<xsl:value-of select="date/year"></xsl:value-of>
					</div>
					<div class="dmonth">
						<span class="mmonth">
							<xsl:value-of select="date/month"></xsl:value-of>-
						</span>
						<span class="mday">
							<xsl:value-of select="date/day"></xsl:value-of>
						</span>
					</div>
				</div>

				<div class="lname">
					<img src="img/p{people}.jpg"/>
				</div>

				<div class="lplace">
					<img src="img/{place}.png"/>
				</div>
				
				<div class="litems">
					<xsl:for-each select="items/item">
						<div class="litem">
							<span class="iname">
								<xsl:value-of select="name"></xsl:value-of>
							</span>
        					<span class="iquan">
        						*<xsl:value-of select="quantity"></xsl:value-of>
        					</span>
						</div>
					</xsl:for-each>
				</div>

				<div class="lcost">
					<xsl:value-of select="cost"></xsl:value-of>
					<span>€</span>
				</div>
				
			</div>
		</xsl:for-each>

	
	</xsl:template>
</xsl:stylesheet>