

.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. ==================================================
.. DEFINE SOME TEXTROLES
.. --------------------------------------------------
.. role::   underline
.. role::   typoscript(code)
.. role::   ts(typoscript)
   :class:  typoscript
.. role::   php(code)


Tips and tricks for large websites (approx. more than 1000 pages)
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

The last version of be\_acl features some improvements for large page
trees which makes be\_acl usable in these environments. It especially
adds some session caching for the ACL computations.

We have seen two bottlenecks when dealing with large installations:
Creating content elements and editing page settings. (These are the
processes which take longest).The performance decreases with the
number of subpages an ACL has. So, if you specify an ACL for every
group on the root page, your performance can very likely be improved a
lot.

We suggest that for these scenarios, you combine the “old” permission
system with the ACL system: For global settings (everything you would
do with ACLs on the root page) use the old permission system, and use
ACLs only for parts of the pagetree (f.e. to give departments write
access to their part of the pagetree).

**Due to the new changes, the ACL cache is per-session. To make sure
somebody sees an ACL permission change, he might have to re-login.**

