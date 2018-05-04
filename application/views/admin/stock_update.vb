Private Sub cmdupdate_Click()
If SecurtyUPDATE(Me.Tag) = False Then Exit Sub
str = Val(txtquantity) '- Val(txtquantity.Tag)
txtqtybal = Val(txtqtybal.Tag) + Val(str)
Call MsgBox("Now Bal. Qty= " + txtqtybal + "", vbInformation + vbApplicationModal)
    con.Execute ("update reciepthead set pname='" + Trim(cmbPname) + "',itype='" + Trim(cmbitype) + "',type='" + Trim(cmbtype) + "',iname='" + Trim(txtparticulars) + "',size1='" + Trim(txtsize) + "',gsm='" + Trim(txtgsm) + "',quantity=" + Trim(txtquantity) + ",qtybal=" + Trim(txtqtybal) + ",unit='" + Trim(cmbUnit) + "',narration='" + Trim(txtnarration) + "',date1='" + Format(dtd.Value, "DD/MMM/YYYY hh:mm:ss ampm") + "',wt='" + Trim(txtwt) + "'  where sno=" + Trim(txtsno) + " and iqty=0")
    Set rs = con.Execute("select sno1 from reciepthead where iqty=0 and sno=" & Val(txtsno))
    str = txtqtybal
   Set rs1 = con.Execute("select sno1  from reciepthead where  pname='" + Trim(cmbPname) + "' and itype='" + Trim(cmbitype) + "' and size1='" + Trim(txtsize) + "' and TYPE='" + Trim(cmbtype) + "' and gsm='" + Trim(txtgsm) + "' and sno1>" + CStr(rs!sno1) + " order by sno1")
   If rs1.RecordCount > 0 Then
      rs1.MoveFirst
      While rs1.EOF = False
        Set rs = con.Execute("select sno,qtybal,quantity  from reciepthead where iqty=0 and pname='" + Trim(cmbPname) + "' and itype='" + Trim(cmbitype) + "' and size1='" + Trim(txtsize) + "' and TYPE='" + Trim(cmbtype) + "' and gsm='" + Trim(txtgsm) + "' and sno1=" + CStr(rs1!sno1))
        If rs.RecordCount > 0 Then
                con.Execute ("update reciepthead set qtybal=" + CStr(rs!quantity + Val(str)) + " where iqty=0 and sno=" + CStr(rs!sno))
                str = CStr(rs!quantity + Val(str))
        Else
                Set rs = con.Execute("select sno,qtybal,iqty  from reciepthead where quantity=0 and pname='" + Trim(cmbPname) + "' and itype='" + Trim(cmbitype) + "' and size1='" + Trim(txtsize) + "' and TYPE='" + Trim(cmbtype) + "' and gsm='" + Trim(txtgsm) + "' and sno1=" + CStr(rs1!sno1))
                If rs.RecordCount > 0 Then
                    con.Execute ("update reciepthead set qtybal=" + CStr(-rs!iqty + Val(str)) + " where  quantity=0 and sno=" + CStr(rs!sno))
                    con.Execute ("update issuehead set bqty=" + CStr(-rs!iqty + Val(str)) + ",tqty=" + CStr(Val(str)) + " where sno=" & Val(rs!sno))
                    str = CStr(-rs!iqty + Val(str))
                End If
        End If
        rs1.MoveNext
      Wend
   End If
    Call MsgBox("Record Updated Successfully ! ! !", vbInformation + vbApplicationModal)
    cmdupdate.Enabled = False
End Sub